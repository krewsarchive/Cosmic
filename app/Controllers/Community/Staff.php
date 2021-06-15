<?php 
namespace App\Controllers\Community;

class Staff extends \App\Controllers\Application
{

    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
        $this->permissionModel = model('PermissionModel');
    }

    public function view()
    {
        $ranks = $this->permissionModel->select('id, rank_name, badge')->where('id > ', 2)->orderBy('id', 'desc')->findAll();

        foreach($ranks as $row) 
        {
            if(!$this->role->hasRoleForUser($row->id, 'website_invisible_staff')) {
                $row->users = $this->userModel->getDataByRank($row->id);
            }
        }

        return $this->render('community/staff', ['data' => $ranks]);
    }
}