<?php
namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table      = 'rooms';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\Room';
  
    protected $allowedFields = ['id','owner_id','owner_name','name', 'description', 'model', 'users_max', 'category', 'paper_floor', 'paper_wall', 'paper_landscape', 'thickness_wall', 'wall_height', 'thickness_floor'];
  
    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = \Config\Database::connect();
    }
}