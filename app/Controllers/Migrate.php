<?php
namespace App\Controllers;

class Migrate extends \CodeIgniter\Controller
{
        public function index()
        {
                $migrate = \Config\Services::migrations();
                try
                {
                    if($migrate->latest()) {
                          $seeder = \Config\Database::seeder();
                          $seeder->call('WebsiteConfigSeeder');
                          $seeder->call('WebsitePermissionSeeder');
                          $seeder->call('WebsiteNewsSeeder');
                    }
                    return redirect('/');
                }
                catch (\Throwable $e)
                {
                      return redirect('/');
                }
        }
}