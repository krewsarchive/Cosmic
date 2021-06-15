<?php 
namespace App\Controllers\Community;

class Photos extends \App\Controllers\Application
{

    public function __construct()
    {
        parent::__construct();
        $this->userModel = model('UserModel');
        $this->cameraModel = model('CameraModel');
    }

    public function view()
    {
        $photos = $this->cameraModel->orderBy('id', 'desc')->findAll(8);
      
        foreach($photos as $photo) {
            $photo->author = $this->userModel->getUserById($photo->user_id, 'username,look');
        }

        return $this->render('community/photos', ['photos' => $photos]);
    }
}