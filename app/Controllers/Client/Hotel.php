<?php
namespace App\Controllers\Client;

use App\Libraries\Habbo\Fastfood;
use App\Models\UserModel;

class Hotel extends \App\Controllers\Application
{

    public function __construct()
    {
        parent::__construct();
    }

    public function view()
    { 
        $this->userModel = model('UserModel');

        $auth_token   = sha1(substr(md5(rand(-10000, 10000)), 0, 6).substr(md5(rand(-20, 10000)), 0, 10).$this->user->id).''.md5($this->user->id);
        $unique_id    = getenv('meteor.hotelname') . '-' . substr(md5(uniqid()), 0, -20);
      
        $this->userModel->update($this->user->id, ['auth_ticket' => $auth_token]);
        
        $data = [
            'auth_token' => $auth_token,
            'unique_id'  => $unique_id
        ];
      
        return $this->render('client/hotel', $data);
    }
}