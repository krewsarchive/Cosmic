<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $fields = [
                'secret_key' => ['type' => 'varchar(20)']
        ];
      
        $this->forge->addColumn('users', $fields);
    }
  
    public function down()
    {
        $this->forge->dropTable('users');
    }
}
