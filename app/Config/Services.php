<?php 
namespace Config;

use CodeIgniter\Config\Services as CoreServices;
use CodeIgniter\Config\BaseConfig;

require_once SYSTEMPATH . 'Config/Services.php';

class Services extends CoreServices
{
    public static function auth($getShared = true) {
        if ($getShared){
            return static::getSharedInstance('auth');
        }
        return new \App\Libraries\Authentication;
    }
  
    public static function rcon($getShared = true) {
        if ($getShared){
            return static::getSharedInstance('rcon');
        }
        return new \App\Libraries\Rcon;
    }
}