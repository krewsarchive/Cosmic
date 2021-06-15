<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;
use CodeIgniter\Database\BaseBuilder;

class UserCurrencyModel extends Model
{
    protected $primaryKey = 'user_id';
    protected $table      = 'users_currency';
    protected $returnType = 'object';
  
    protected $allowedFields = ['user_id','type','amount'];
 
    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = Database::connect();
    }
  
    public function get($user_id)
    {
      $query = $this->db->query("SELECT user_id,amount,type, (SELECT SUBSTRING_INDEX(REPLACE(`key`, 'currency.', ''),'.',1) FROM website_config WHERE `key` LIKE CONCAT('%', currency.type)) AS currency FROM users_currency currency where user_id = '".$user_id."'")->getResult();
      
      foreach($query as $row) $data[$row->currency] = $row; return $data;
    }
}