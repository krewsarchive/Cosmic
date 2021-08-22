<?php
namespace Cosmic\App\Controllers\Help;

use Cosmic\System\LocaleService;
use Cosmic\System\ViewService;

class Ticket
{
    public function index()
    {
        ViewService::renderTemplate('Help/new.html', [
            'title'     => LocaleService::get('core/title/help/new'),
            'page'      => 'help_new'
        ]);
    }
}