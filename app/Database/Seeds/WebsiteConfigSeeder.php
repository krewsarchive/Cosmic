<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WebsiteConfigSeeder extends Seeder
{
        public function run()
        {
                $data = [
                  [
                      'key' => 'krews_api_useragent',
                      'value' => '',
                  ],
                  [
                      'key' => 'krews_api_advanced_stats',
                      'value' => '1',
                  ],
                  [
                      'key' => 'krews_api_hotel_slug',
                      'value' => '',
                  ],
                  [
                      'key' => 'rcon_api_host',
                      'value' => '127.0.0.1',
                  ],
                  [
                      'key' => 'rcon_api_port',
                      'value' => '3001',
                  ],
                  [
                      'key' => 'recaptcha_publickey',
                      'value' => '6LepDKsUAAAAAEnPxCPVJ7KxazzQ7TIvZkjF2ssb',
                  ],
                  [
                      'key' => 'recaptcha_secretkey',
                      'value' => '6LepDKsUAAAAAJMgACYrxoTpranj9bzMk7rRAtIJ',
                  ],
                  [
                      'key' => 'maintenance',
                      'value' => '0',
                  ],
                  [
                      'key' => 'default.credits',
                      'value' => '1000',
                  ],
                  [
                      'key' => 'default.motto',
                      'value' => 'Welkom bij Meteor',
                  ],
                  [
                      'key' => 'website.cache',
                      'value' => 'off',
                  ],
                  [
                      'key' => 'currency.duckets.0',
                      'value' => '1000',
                  ],
                  [
                      'key' => 'currency.diamonds.5',
                      'value' => '1000',
                  ],
                  [
                      'key' => 'currency.gotw.103',
                      'value' => '1000',
                  ],
                ];

                $this->db->table('website_config')->insertBatch($data);
        }
}