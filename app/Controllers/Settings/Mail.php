<?php 
namespace App\Controllers\Settings;

use Sonata\GoogleAuthenticator\GoogleAuthenticator;

class Mail extends \App\Controllers\Application
{  
    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
    }
  
    public function save()
    {      
        $token =$this->request->getVar('token', FILTER_SANITIZE_STRING);
        if($this->user->secret_code !== null && $token === NULL) {
            return redirect()->back()->withInput()->with('modal', 'mailAuth');
        }
        
        if (!$this->validate([
            'token' => 'required|is_unique[users.mail]|valid_email'
        ])) {
            return redirect()->back()->with('validation', $this->validator);
        }
      
        $this->userModel->set('mail', $token)->where('mail', $this->user->mail)->update();
        return redirect()->back()->with('success', 'Je mail adres is gewijzigd!');
    }
  
    public function view()
    { 
        return $this->render('settings/mail', ['nav' => 'mail']);
    }
  
}