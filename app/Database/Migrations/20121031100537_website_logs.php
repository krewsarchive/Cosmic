<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebsiteLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
             'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => '60',
                'null' => true
            ],
            'target' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ],
            'message' => [
                'type' => 'text',
                'constraint' => '500',
                'null' => true
            ],
            'ip_address' => [
                'type' => 'varchar',
                'constraint' => '50',
                'null' => true
            ],
            'timestamp' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('website_logs');
    }
  
    public function down()
    {
            $this->forge->dropTable('blog');
    }
}
