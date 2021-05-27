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
  
    public function __construct()
    {
        $this->settings = Core::settings();
    }
  
    public function welcome()
    {
        $this->callback = [
                "message" => "hello world"
        ];
      
        return response()->json($this->callback);
    }
  
    public function ssotoken()
    {
        if(empty($_SESSION['auth_ticket'])){
            http_response_code(401);
            return response()->json(['message' => 'no token']);
        }
      
        $this->callback = [
                "ssoToken" => $_SESSION['auth_ticket']
        ];
      
        $user = Player::getDataById(request()->player->id);
        if ($user->getMembership()) {
            HotelApi::execute('setrank', ['user_id' => $user->id, 'rank' => $user->getMembership()->old_rank]);
            $user->deleteMembership();
        }
      
        return response()->json($this->callback);
    }
  
    private function generateSso($player)
    {
        $auth_ticket = Token::authTicket($player->id);
        Player::update($player->id, ["auth_ticket" => $auth_ticket]);
        return $auth_ticket;
    }
  
    public function ssoTicket()
    {
        if(!request()->player) {
            response()->json([
                'error' => 'Required login',
            ]);
        }
      
        $ssoticket = $this->generateSso(request()->player);
        if(!empty($ssoticket)) {
            response()->json(["status" => "success",  "ticket" => $ssoticket]);
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

    public function user($callback, $username)
    {
        if($username == 'avatars') {
            $this->avatars();
        }
      
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
            'duckets'   => Player::getUserCurrencys($user->id, 0)->amount,
            'diamonds'  => Player::getUserCurrencys($user->id, 5)->amount
        ];

        response()->json($response);
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
