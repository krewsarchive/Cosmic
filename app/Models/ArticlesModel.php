<?php
namespace App\Models;

class ArticlesModel extends \CodeIgniter\Model
{

    protected $primaryKey = 'id';
    protected $table      = 'website_news';
    protected $returnType = 'object';

    public function __construct(...$params)
    {
        parent::__construct(...$params);
        $this->db = \Config\Database::connect();
        $this->orderBy('id', 'desc');
    }
}
