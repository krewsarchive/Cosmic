<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebsiteConfig extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'key' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'auto_increment' => true,
            ],
            'value' => [
                'type' => 'VARCHAR',
                'constraint' => '50'
            ]
        ]);
        $this->forge->createTable('website_config');
      

    }
  
    public function down()
    {
        $this->forge->dropTable('website_config');
    }
}
