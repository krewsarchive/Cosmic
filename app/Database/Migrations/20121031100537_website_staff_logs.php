<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebsiteStaffLogs extends Migration
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
                'constraint' => '25',
                'null' => true
            ],
            'value' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'player_id' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ],
            'target' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ],
            'timestamp' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('website_staff_logs');
    }
  
    public function down()
    {
            $this->forge->dropTable('website_news');
    }
}
