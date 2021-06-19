<?php 
namespace App\Controllers\Home;

class Home extends \App\Controllers\Application
{  
    public function __construct()
    {
        parent::__construct();
        $this->articlesModel = model('ArticlesModel');
    }
  
    public function me()
    {       
        
        if($this->user) {
            $this->userCurrency = model('UserCurrencyModel');
            $currencys = $this->userCurrency->get($this->user->id);
        }
      
        $articles = $this->articlesModel->findAll(getenv('meteor.limit.news'));
      
        return $this->twig->display('home/me', [
            'articles'  => $articles, 
            'currencys' => $currencys ?? null, 
            'page'      => 'home'
        ]);
    }
  
}