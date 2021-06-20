<?php
namespace App\Controllers\Community;

class Profile extends \App\Controllers\Application
{
    public function __construct()
    {
        parent::__construct();
        $this->articlesModel = model('ArticlesModel');
        $this->userModel = model('UserModel');
    }
  
    public function view()
    {
        return $this->render('community/profile', []);
    }
}