<?php
namespace App\Models;

class CameraModel extends \CodeIgniter\Model
{

    protected $primaryKey = 'id';
    protected $table      = 'camera_web';
    protected $returnType = 'object';

    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = \Config\Database::connect();
        $this->orderBy('id', 'desc');
    }
}
