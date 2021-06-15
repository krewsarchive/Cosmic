<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UserSettingsModel extends Model
{
    protected $primaryKey = 'id';
    protected $table      = 'users_settings';
    protected $returnType = 'object';
  
    protected $allowedFields = ['user_id', 'block_following', 'block_friendrequests', 'block_roominvites', 'old_chat', 'block_alerts', 'credits'];

    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = Database::connect();
    }
  
    public function settings($player_id)
    {
        return $this->where('user_id', $player_id)->get()->getResult();
    }
}