<?php 
namespace App\Controllers\Auth;

use App\Entities\User;

class Registration extends \App\Controllers\Application
{
    public function __construct()
    {
        parent::__construct();
        $this->userCurrencyModel = model('UserCurrencyModel');
        $this->userModel = model('UserModel');
        $this->configModel = model('ConfigModel');
        $this->userSettingsModel = model('UserSettingsModel');
    }

    public function create()
    {     
        /*
        *   Store in Database 
        */
        helper('custom');

        $user = new User($this->request->getPost());

        $user->motto = $this->configModel->find('default.motto')->value;
        $user->credits = $this->configModel->find('default.credits')->value;
      
        $user->ip_current = getIpAddress();
        $user->ip_register = getIpAddress();

        $user_id = $this->userModel->insert($user);
        if(!$user_id) { 
            return redirect()->back()->with('errors', $this->userModel->errors())->with('warning', lang('App.messages.invalid'))->withInput();
        }
      
        /*
        *   Create user currencys
        */

        $currencys = $this->configModel->getCurrencys();

        if($currencys) {
            foreach($currencys as $currency) {
                $type = substr($currency->key, strrpos($currency->key, '.') + 1);
                $this->userCurrencyModel->insert(['user_id' => $user_id, 'type' => $type, 'amount' => $currency->value]);
            }
        }

        $this->session->set('user', $this->userModel->find($user_id));
        return redirect()->to('/hotel');
      }
  
    public function view() 
    {
        helper('form');
        return $this->twig->display('auth/registration', ['page' => 'register']);
    }
}