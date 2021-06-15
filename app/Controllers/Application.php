<?php
namespace App\Controllers;

use Raizdev\Twig\Twig;

use App\Models\ConfigModel;
use App\Models\UserModel;

use CodeIgniter\Controller;
use CodeIgniter\Files\Exceptions\FileNotFoundException;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;

use Config\App;
use Config\Services;

use Psr\Log\LoggerInterface;

class Application extends Controller
{
    protected $session;
    protected $user;
  
    protected $helpers = ['custom', 'auth', 'form_errors'];

    public function __construct()
    {
    }
  
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
      
        $this->twig = new Twig();
      
        $this->role = \Config\Services::enforcer();
        $this->session = \Config\Services::session();

        $this->twig->addGlobal('session', $this->session);
      
        if ($this->session->has('user')) { 
            $this->user = (new UserModel())->find($this->session->get('user')->id);
            $this->user->permission = $this->role->getRolesForUser($this->user->rank);
          
            $this->twig->addGlobal('user', $this->session->get('user'));
        }
    }
}