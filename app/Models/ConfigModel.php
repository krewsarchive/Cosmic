<?php
namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class ConfigModel extends Model
{
    protected $primaryKey = 'key';
    protected $table      = 'website_config';
    protected $returnType = 'object';

    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = Database::connect();
    }
  
    public function getCurrencys()
    {
        return $this->like('key', 'currency.')->asObject()->get()->getResult();
    }
}