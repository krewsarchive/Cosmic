<?php
namespace App\Controllers;

use App\Config;
use App\Hash;
use App\Token;

use App\Models\Core;
use App\Models\Room;
use App\Models\Player;

use Library\HotelApi;
use Library\Json;

use Core\Session;
use Core\Locale;
use \Selly as Selly;

class Api
{
    public $callback = array();
    public $settings;
    public $krewsList;
  
  
    const discordApi = 'https://discord.com/api/oauth2/authorize';
    const discordToken = 'https://discord.com/api/oauth2/token';
    const apiBase = 'https://discord.com/api/users/@me';
  
    public function __construct()
    {
        $this->settings = Core::settings();
    }

    public function ssoTicket()
    {
        if(!request()->player) {
            response()->json([
                'error' => 'Required login',
            ]);
        }
      
        $auth_ticket = Token::authTicket($player->id);
        Player::update($player->id, ["auth_ticket" => $auth_ticket]);
      
        if(!empty($auth_ticket)) {
            response()->json(["status" => "success",  "ticket" => $auth_ticket]);
        }
    }
  
    public function vote()
    {
          $FindRetros = new \Library\FindRetros();

          if($FindRetros->hasClientVoted()) {  
              $this->callback = ["status" => "voted"];
          } else {
              $this->callback = [
                  "status"  => 0,
                  "api"     => $FindRetros->redirectClient()
              ];
          }
          response()->json($this->callback ?? null);
    }
  
    public function room($roomId)
    {
        if (!request()->player->online) {
            response()->json(["status" => "success",  "replacepage" => "hotel?room=" . $roomId]);
        }

        $room = \App\Models\Room::getById($roomId);
        if ($room == null) {
            response()->json(["status" => "error", "message" => Locale::get('core/notification/room_not_exists')]);
        }

        HotelApi::execute('forwarduser', array('user_id' => request()->player->id, 'room_id' => $roomId));
        response()->json(["status" => "success",  "replacepage" => "hotel"]);
      
    }

    public function user($username)
    {
        $user = Player::getDataByUsername($username);
        if(!$user) {
            response()->json([
                'error' => 'User not found'
            ]);
        }

        $response = [
            'username'  => $user->username,
            'motto'     => $user->motto,
            'credits'   => $user->credits,
            'look'      => $user->look,
        ];

        foreach(Player::getCurrencys(request()->player->id) as $value) {
              foreach($value as $key) {
                  //array_push($response, [$key => ]);
              }
        }
      
        response()->json($response);
    }
  
    public function discordAuth()
    {
        $params = [
            'client_id'     => '531125300235337728',
            'redirect_uri'  => 'https://yoursite.location/ifyouneedit',
            'response_type' => 'code',
            'scope'         => 'identify guilds'
          ];

          redirect('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params), 200);
          die();
    }
  
    public function online()
    {
        echo Core::getOnlineCount();
    }
  
    public function currencys() 
    {
        response()->json(Core::getCurrencys());
    }
}
