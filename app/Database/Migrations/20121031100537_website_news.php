<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WebsiteNews extends Migration
{
    public function up()
    {
        $this->forge->addField([
             'id' => [
                'type' => 'INT',
                'constraint' => '11',
                'auto_increment' => true,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'title' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'short_story' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'full_story' => [
                'type' => 'text',
                'constraint' => '0',
                'null' => true
            ],
            'images' => [
                'type' => 'text',
                'constraint' => '0',
                'null' => true
            ],
            'author' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ],
            'header' => [
                'type' => 'varchar',
                'constraint' => '255',
                'null' => true
            ],
            'category' => [
                'type' => 'int',
                'constraint' => '1',
                'null' => true
            ],
            'timestamp' => [
                'type' => 'int',
                'constraint' => '11',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('website_news');
    }
  
    public function down()
    {
        $this->forge->dropTable('website_news');
    }
}
