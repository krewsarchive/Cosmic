<?php
namespace App\Middleware;

use App\Auth;
use App\Config;

use App\Models\Player;

use Core\Session;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class AuthMiddleware implements IMiddleware
{
    public function handle(Request $request) : void
    {
        if(url()->contains('Admin')) {
            $request->setRewriteUrl(url('lost'));            
        }
<<<<<<< HEAD
      
        $request->player = Player::getDataById(Session::get('player_id'));
        if($request->player == null) {
           return;
=======

        if(!Session::exists('player_id')) {
            $request->setRewriteUrl(url('lost'));
        }

        $request->player = Player::getDataById(Session::get('player_id'));
        if($request->player == null) {
           $request->setRewriteUrl(url('lost'));
>>>>>>> e4604c31e0237059f4f30b8e7297e0c561149dc3
        }
      
       if (getIpAddress() != $request->player->ip_current || $_SERVER['HTTP_USER_AGENT'] != Session::get('agent')) {
            Auth::logout();
            redirect('/');
        }
    }
}

