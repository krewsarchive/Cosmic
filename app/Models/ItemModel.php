<?php
namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'items';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\RoomItem';
  
    protected $allowedFields = ['id','user_id','room_id','item_id', 'x', 'y', 'z', 'rot', 'extra_data', 'wall_pos'];
  
    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = \Config\Database::connect();
    }
}