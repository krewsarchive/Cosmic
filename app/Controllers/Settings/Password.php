<?php 
namespace App\Controllers\Settings;

use Sonata\GoogleAuthenticator\GoogleAuthenticator;

class Password extends \App\Controllers\Application
{  
    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
    }
  
    public function save()
    {
        if (!$this->validate([
            'oldpassword'       => 'required',
            'password'          => 'required|min_length[3]|max_length[14]',
            'password_repeat'   => 'required|matches[password]'
        ])) {
            return redirect()->back()->with('validation', $this->validator);
        }
      
        $password = password_hash($this->request->getVar('oldpassword'), PASSWORD_BCRYPT);
        if(password_verify($password, $this->user->password)) {
            return redirect()->back()->with('error', 'Wachtwoord komt niet overeen met huidige wachtwoord!');
        }
      
        if($this->user->secret_code !== null) {
            return redirect()->back()->withInput()->with('modal', 'passwordAuth');
        }
        
        $this->update($password);
    }
  
    public function auth()
    {
        if (!$this->validate([
              'pincode'  => 'required|min_length[6]|numeric'
          ])) {
              $this->session->setFlashdata('validation', $this->validator);
              return redirect()->back()->with('modal', 'passwordAuth');
          }

          if (!(new GoogleAuthenticator())->checkCode($this->user->secret_key, $this->request->getVar('token'))) {
              $this->session->setFlashdata('error', '2FA code onjuist ingevoerd!');
              return redirect()->back()->with('modal', 'passwordAuth');
          }
  
        $this->update(password_hash($this->request->getVar('token'), PASSWORD_BCRYPT));   
    }
  
    protected function update($password)
    {
        $this->userModel->set('password', $password)->where('mail', $this->user->mail)->update();
        return redirect()->back()->with('success', 'Wachtwoord is gewijzigd!');
    }

  
    public function view()
    { 
        return $this->render('settings/password', ['nav' => 'password']);
    }
  
}