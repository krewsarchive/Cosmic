<?php
namespace App\Models;

use QueryBuilder;

class Shop
{
   
    public static function getOffers()
    {
        return QueryBuilder::table('website_paypal_offers')->get();
    }

    public static function getOfferById($id)
    {
        return QueryBuilder::table('website_paypal_offers')->where('id', $id)->first();
    }
  
    public static function getOfferByOrderid($id)
    {
        return QueryBuilder::table('website_paypal_offers')->where('order_id', $id)->first();
    }
  
    public static function insertOffer($user_id, $offer_id, $order_id, $payer_id, $status)
    {
        $data = [
            'user_id'   => $user_id,
            'offer_id'  => $offer_id,
            'order_id'  => $order_id,
            'payer_id'  => $payer_id,
            'status'    => $status,
        ];
      
        return QueryBuilder::table('website_paypal_payments')->insert($data);
    }
  
    public static function updateOffer($order_id, $status)
    {
        $data = [
            'status' => $status
        ];
      
        return QueryBuilder::table('website_paypal_payments')->where('order_id', $order_id)->update($data);
    }
  
  
    public static function update($order_id, $status, $colom)
    {
        $data = [
            $colom => $status
        ];
      
        return QueryBuilder::table('website_paypal_payments')->where('order_id', $order_id)->update($data);
    }
   
  
    public static function updateCurrency($player, $amount, $type) 
    {
        return QueryBuilder::query("UPDATE users_currency SET amount = amount + {$amount} WHERE user_id = {$player} AND type = {$type}");
    }
  
    public static function getPayment($orderId)
    {
        return QueryBuilder::table('website_paypal_payments')->where('order_id', $orderId)->first();
    }
  
    public static function insertBadge($user_id, $filename)
    {
        return QueryBuilder::table('website_badge_requests')->insert(array("user_id" => $user_id, "badge_imaging" => $filename));
    }
}