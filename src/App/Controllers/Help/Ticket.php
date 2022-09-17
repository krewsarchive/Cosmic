<?php
namespace Cosmic\App\Controllers\Help;

use Cosmic\App\Middleware\BannedMiddleware;

use Cosmic\App\Models\Help;

use Cosmic\System\LocaleService;
use Cosmic\System\ViewService;

class Ticket
{
    public function index()
    {
        $banned_reason = BannedMiddleware::$ban;
      
        if(request()->player) {
            $tickets = Help::getTicketsByUserId(request()->player->id);
            $this->tickets = $tickets;
        }
      
        ViewService::renderTemplate('Help/new.html', [
            'title'     => LocaleService::get('core/title/help/new'),
            'page'      => 'help_new',
            'banned_reason' => $banned_reason,
            'tickets' => $this->tickets
        ]);
    }
}