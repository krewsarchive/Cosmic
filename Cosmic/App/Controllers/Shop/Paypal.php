<?php
namespace App\Controllers\Shop;

use Library\Paypal as ClientPaypal;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

use stdClass;

class Paypal
{
    public static function createOrder($debug=false)
    {
        /*
        * Check if player is logged in
        */

        if(!isset(request()->player->id)) {
            return;
        }
      
        /*
         * Validate post request
         */
      
        $validate = request()->validator->validate([
            'user_id' => 'required|min:1|max:30',
            'token'   => 'required|min:1|max:100'
        ]);

        if (!$validate->isSuccess()) {
            exit;
        }
      
        $user_id  = input()->post('user_id')->value;
        $token    = input()->post('token')->value;
      
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = self::buildRequestBody();
      
      
   // 3. Call PayPal to set up a transaction
    $client = ClientPaypal::client();
    $response = $client->execute($request);
    if ($debug)
    {
      print "Status Code: {$response->statusCode}\n";
      print "Status: {$response->result->status}\n";
      print "Order ID: {$response->result->id}\n";
      print "Intent: {$response->result->intent}\n";
      print "Links:\n";
      foreach($response->result->links as $link)
      {
        print "\t{$link->rel}: {$link->href}\tCall Type: {$link->method}\n";
      }

      // To print the whole response body, uncomment the following line
      // echo json_encode($response->result, JSON_PRETTY_PRINT);
    }

    // 4. Return a successful response to the client.
    debug($response);
  }

  /**
     * Setting up the JSON request body for creating the order with minimum request body. The intent in the
     * request body should be "AUTHORIZE" for authorize intent flow.
     *
     */
    private static function buildRequestBody()
    {
        return array(
            'intent' => 'CAPTURE',
            'application_context' =>
                array(
                    'return_url' => 'https://example.com/return',
                    'cancel_url' => 'https://example.com/cancel'
                ),
            'purchase_units' =>
                        array(
                            'amount' =>
                                array(
                                    'value' => '220.00'
                                )
                )
        );
    }
  
  
}