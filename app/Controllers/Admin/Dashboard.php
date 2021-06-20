<?php 
namespace App\Controllers\Admin;

class Dashboard extends \App\Controllers\Application
{
    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
    }
  
    public function view()
    {
        $latestUsers = $this->userModel->orderBy('id', 'desc')->findAll(100);
        return $this->render('admin/dashboard', ['latestUsers' => $latestUsers]);
    }
}