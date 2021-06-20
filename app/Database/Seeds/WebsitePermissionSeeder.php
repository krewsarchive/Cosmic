<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WebsitePermissionSeeder extends Seeder
{
        public function run()
        {
            $data = [
                [
                    'id'      => 1,
                    'ptype'   => 'g',
                    'v0'      => 7,
                    'v1'      => 'housekeeping',
                ],
                [
                    'id'      => 2,
                    'ptype'   => 'g',
                    'v0'      => 7,
                    'v1'      => 'website_invisible_staff',
                ],
            ];

            $this->db->table('website_permissions')->insertBatch($data);
        }
}