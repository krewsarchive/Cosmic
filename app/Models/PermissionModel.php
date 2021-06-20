<?php
namespace App\Models;

class PermissionModel extends \CodeIgniter\Model
{

    protected $primaryKey = 'id';
    protected $table      = 'permissions';
    protected $returnType = 'object';
  
    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = \Config\Database::connect();
    }
}