<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class migrate implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = nul)
    {
        $db = \Config\Database::connect();
      
        if(!$db->tableExists('users')) {
            echo 'Please import arcturus database first!';
            exit;
        }
        
        if(!$db->tableExists('migrations') && $request->getServer('REQUEST_URI') == '/') {
            echo '<a href="/migrate/start">Start migration</a>';
            exit;
        }
      
        if(!$db->tableExists('migrations') && $request->getServer('REQUEST_URI') == '/migrate/start') {
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
  
   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

} 