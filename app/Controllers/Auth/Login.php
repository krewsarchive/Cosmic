<?php 
namespace App\Controllers\Auth;

use Sonata\GoogleAuthenticator\GoogleAuthenticator;
use App\Libraries\Log;

class Login extends \App\Controllers\Application
{
    protected $helpers = ['url', 'form'];
  
    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
        $this->articlesModel = model('ArticlesModel'); 
    }
  
    public function request()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $auth = service('auth');
        if ($auth->login($username, $password)) {
            $redirect_url = session('redirect_url') ?? '/';
            unset($_SESSION['redirect_url']);
            
            return redirect()->back()->withInput()->with('warning', lang('Login.invalid'));
        }

        return redirect()->back()->withInput()->with('warning', lang('Login.invalid'));
    }
  
    public function logout()
    {
        $this->session->removeTempdata('user');
        $this->session->stop();
      
        return redirect()->to('/');
    }
  
    public function view()
    {
        $auth = service('auth');
        if ($auth->isLoggedIn())
        {
            return redirect()->to(site_url('home'));
        }

        $latestUsers = $this->userModel->orderBy('id', 'desc')->findAll();
        $getArticles = $this->articlesModel->findAll(getenv('meteor.home.news.limit'));
        return $this->twig->display('auth/login', ['articles' => $getArticles, 'latestUsers' => $latestUsers, 'page' => 'index']);
    }
}