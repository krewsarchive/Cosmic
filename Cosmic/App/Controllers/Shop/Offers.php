<?php
namespace App\Controllers\Shop;

use App\Config;

use App\Models\Log;
use App\Models\Core;
use App\Models\Player;
use App\Models\Shop;

use Core\Locale;
use Core\View;

use Library\HotelApi;
use Library\Json;

use Library\Paypal as ClientPaypal;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use stdClass;

class Offers
{
    public function createorder()
    {     
        $validate = request()->validator->validate([
            'orderId'  => 'required'
        ]);

        if(!$validate->isSuccess()) {
            return;
        }
      
        if(!isset(request()->player->id)) {
            return;
        }
      
        $offer = Shop::getOfferById(input('orderId'));
      
        if(!$offer) {
            response()->json(["status" => "error", "message" => "Order type not found"]);
        }
      
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody($offer);

        $client = ClientPaypal::client();
        $response = $client->execute($request);
      
        if($response) {
            $created = Shop::insertOffer(request()->player->id, input('orderId'), $response->result->id, $response->result->purchase_units[0]->payee->merchant_id, $response->result->status);
            if($created) {
                return json_encode($response->result, JSON_PRETTY_PRINT);
            }
        }
    }
  
    public static function captureorder()
    {     
        $validate = request()->validator->validate([
            'orderId' => 'required',
            'offerId' => 'required'
        ]);

        if(!$validate->isSuccess()) {
            return;
        }
      
        if(!isset(request()->player->id)) {
            return;
        }
      
        $offer = Shop::getOfferById(input('offerId'));
      
        if(!$offer) {
            response()->json(["status" => "error", "message" => "Order type not found"]);
        }
      
        $request = new OrdersCaptureRequest(input('orderId'));
        $client = ClientPaypal::client();
        $response = $client->execute($request);
        
        if($response) {
            $created = Shop::updateOffer($response->result->id, $response->result->status);
            if($created) {
                return json_encode($response->result, JSON_PRETTY_PRINT);
            }
        }
    }

    private static function buildRequestBody($offer)
    {
        return array(
            'intent' => 'CAPTURE',
            'purchase_units' =>
                array(
                    0 =>
                        array(
                            'amount' =>
                                array(
                                    'currency_code' => $offer->currency,
                                    'value' => $offer->price
                                )
                        )
                )
        );
    }
  
    public function status()
    {
        $validate = request()->validator->validate([
            'orderId'  => 'required',
            'status'   => 'required|pattern:^(?:CANCELDORFAILED)$',
        ]);

        if(!$validate->isSuccess()) {
            return;
        }
      
        Shop::update(input('orderId'), input('status'), 'status');
        response()->json(["status" => "success", "error" => "Order changed to: " . input('status')]);
    }
  
    public function vip($offer)
    {
        $data = json_decode($offer);
      
        foreach($data as $key => $value) {
            if(is_array($value)) {
                foreach($value as $badge => $key) {
                    HotelApi::execute($key, ['user_id' => request()->player->id, $key]);
                }
            } else {
                HotelApi::execute($key, ['user_id' => request()->player->id, $value]);
            }
        }
    }

    public function validate()
    {
        $validate = request()->validator->validate([
            'orderId'  => 'required'
        ]);

        if(!$validate->isSuccess()) {
            return;
        }

        $order = Shop::getPayment(input('orderId'));
        if ($order == null) {
            response()->json(["status" => "error", "message" => Locale::get('shop/offers/invalid_transaction')]);
        }

        if ($order->status != 'COMPLETED') {
            response()->json(["status" => "error", "loadpage" => '/shop/order/view/' . input('orderId'), "message" => "Order isn't ready yet, please check if your payment has been accepted"]);
        } else if ($order->status == 'COMPLETED' && $order->delivered == "NO") {
            $offer = Shop::getOfferById($order->offer_id);
          
            if($offer->currency_type == 'vip') {
                $this->vip($offer->data);
            } else {
                if(!HotelApi::execute('givepoints', ['user_id' => request()->player->id, 'points' => $offer->amount, 'type' => $offer->currency_type])) {
                    Shop::updateCurrency(request()->player->id, $offer->amount, $offer->currency_type);
                }
            }
          
            Shop::update(input('orderId'), "YES", 'delivered');
            response()->json(["status" => "success", "message" => "Order delivered: " . $offer->amount]);
        }
    }
}