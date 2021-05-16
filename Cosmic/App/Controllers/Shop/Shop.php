<?php
namespace App\Controllers\Shop;

use App\Config;

use App\Models\Player;
use App\Models\Core;
use App\Models\Permission;
use App\Models\Shop as Offer;

use Core\Locale;
use Core\View;

use stdClass;

class Shop
{
    private $data;

    public function __construct()
    {
        $this->data = new stdClass();
    }
  
    public function vip($offers)
    {
        $offers->currency = "VIP";
        $offers->data = json_decode($offers->data);
        $offers->description = '';

        if($offers->data !== null)

        foreach($offers->data as $key => $value) 
        {
            if(is_array($value)) 
            {
                $offers->description .= '<li> '. Locale::get('website/shop/get') . ' these badges</li>';
                foreach($value as $badge => $key) 
                {
                    if(isset($key->badge))
                        $offers->description .= '<img src="'. Config::site['cpath'] .'/c_images/album1584/' . $key->badge . '">';
                }
            } else {
                if($key == "givecredits") 
                {
                    $offers->description .= '<li>'. Locale::get('website/shop/get') . ' '. $value->credits . ' credits</li>';
                } else if($key == "givepoints") 
                {
                    $currency = Core::getCurrencyByType($value->type)->currency;
                    $offers->description .= '<li> '. Locale::get('website/shop/get') . ' ' . $value->points . ' ' . $currency .'</li>';
                } else if($key == "setrank") 
                {
                    $ranks = Permission::getRanks();
                    $arrayId = array_search($value->rank, array_column($ranks, 'id'));
                    $offers->description .= '<li>'. Locale::get('website/shop/get') . ' the rank ' . $ranks[$arrayId]->rank_name .'</li>';
                }
            }
        }
    }

    public function index()
    {
        $this->data->shop = Offer::getOffers();
      
        foreach($this->data->shop as $offers) 
        { 
            $offers->currency = Core::getCurrencyByType($offers->currency_type)->currency;
          
            if($offers->currency_type == "vip") 
            {
                $this->vip($offers);
            }
        }
      
        $this->data->currencys = Player::getCurrencys(request()->player->id);
        View::renderTemplate('Shop/shop.html', [
            'title' => Locale::get('core/title/shop/index'),
            'page'  => 'shop',
            'data'  => $this->data
        ]);
    }
}