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
    public function handle(Request $request) : void
    {
        if (!SessionService::exists('player_id')) {
            $request->setRewriteUrl(redirect('/'));
        }

        $request->player = Player::getDataById(SessionService::get('player_id'));
        if($request->player == null) {
           return;
        }
        
        if(Ban::getBanByUserIp(getIpAddress() || Ban::getBanByUserId($player->id))) {
           $ban = $account ?? $ip_address;
            if(url()->contains('/help/requests/new')) {
                return;
            } else {
                redirect('/help/requests/new');
            }
        }
    }
}