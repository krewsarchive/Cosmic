<?php 
namespace App\Controllers\Settings;

use Sonata\GoogleAuthenticator\GoogleAuthenticator;

class Verification extends \App\Controllers\Application
{  
    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
    }
  
    public function save()
    {
        $this->auth = new GoogleAuthenticator();
      
        $password = $this->request->getVar('password');
        $pincode  = $this->request->getVar('pincode');
        $token    = $this->request->getVar('token');
        $enabled  = $this->request->getVar('enabled');
      
        if(!empty($password)) {
          
            $hash = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT); 
            if(!password_verify($password, $this->user->password)) {
                return redirect()->back()->with('error', 'Wachtwoord komt niet overeen met huidige wachtwoord!');
            }
      
            return redirect()->back()->withInput()->with('modal', 'verificationAuth');
        }

        if (!($this->auth->checkCode($token, $pincode))) {
            $this->session->setFlashdata('error', '2FA code onjuist ingevoerd!');
            return redirect()->back()->withInput()->with('modal', 'verificationAuth');
        }
      
        
        if(empty($this->user->secret_code)) {
            $this->userModel->set(['secret_code' => $token])->where('mail', $this->user->mail)->update(); 
            return redirect()->back()->with('success', 'Jouw Google 2FA authorisatie is ingesteld!');
        }
      
        $this->userModel->set(['secret_code' => NULL])->where('mail', $this->user->mail)->update();
        return redirect()->back()->with('success', 'Jouw Google 2FA authorisatie is uitgeschakeld!');
    }
  
    public function view()
    { 
        $token = (!$this->user->secret_code ? (new GoogleAuthenticator())->generateSecret() : $this->user->secret_code);
        return $this->render('settings/verification', ['token' => $token, 'nav' => 'verification']);
    }
  
}