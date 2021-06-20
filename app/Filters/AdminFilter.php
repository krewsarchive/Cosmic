<?php
namespace App\Filters;

use App\Models\UserModel;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use Config\Services;

class AdminFilter implements FilterInterface
{
 
    public function before(RequestInterface $request, $arguments = nul)
    {
        $role = Services::enforcer();
        $user = service('auth')->getCurrentUser();
      
        if (!$user && !$role->hasRoleForUser($user->rank, 'housekeeping')) {
            $response = service('response');
            
            $response->setStatusCode(403);
            $response->setBody('You do not have permission to access that resource');
            
            return $response;
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

} 