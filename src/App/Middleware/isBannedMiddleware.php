<?php
namespace Cosmic\App\Middleware;

use Cosmic\App\Controllers\Auth\Auth;
use Cosmic\App\Models\Permission;
use Cosmic\App\Models\Player;
use Cosmic\App\Models\Ban;

use Cosmic\System\SessionService;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class isBannedMiddleware implements IMiddleware
{
    public static $ban;
  
    public function handle(Request $request) : void
    {
        if (!SessionService::exists('player_id')) {
            $request->setRewriteUrl(redirect('/'));
        }

        $request->player = Player::getDataById(SessionService::get('player_id'));
        if($request->player == null) {
           return;
        }
        
        $account = Ban::getBanByUserIp(getIpAddress());
        $ip_address = Ban::getBanByUserId($request->player->id);
                                       
        if($account || $ip_address) {
            $ban = $account ?? $ip_address;
            if(url()->contains('/help/requests/new') || url()->contains('/help/requests/')) {
                self::$ban = $ban;
                return;
            } else {
                redirect('/help/requests/new');
            }
        }
    }
}