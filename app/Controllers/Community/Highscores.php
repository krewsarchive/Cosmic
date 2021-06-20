<?php 
namespace App\Controllers\Community;

class Highscores extends \App\Controllers\Application
{

    public function __construct()
    {
        parent::__construct();
        $this->communityModel = model('UserModel');
        $this->configModel = model('ConfigModel');
        $this->userCurrencyModel = model('UserCurrencyModel');
    }

    public function view() 
    {
        $getMostCredits = $this->communityModel->select('username, credits, look')->orderBy('credits', 'desc')->findAll(getenv('meteor.limit.highscores'));
        $getMostPoints  = $this->configModel->getCurrencys();
      
        foreach($getMostPoints as $currency){
          
            $currencys = explode(".", $currency->key);
            
            $highscore = $this->userCurrencyModel->where('type', $currencys[2])->orderBy('amount', 'desc')->findAll(getenv('meteor.limit.highscores'));
          
            foreach($highscore as $user) {
                $user->user = $this->communityModel->find($user->user_id);
            }
        
            $currency->currency   = $currencys[1];
            $currency->highscores = $highscore;
        }

        return $this->render('community/overview', ['getCreditsUsers' => $getMostCredits, 'getMostPoints' => $getMostPoints]);
    }
}