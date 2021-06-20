<?php
namespace App\Models;

class UserModel extends \CodeIgniter\Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\User';
    
    protected $useTimestamps = true;
  
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
  
    protected $allowedFields = ['id', 'username', 'password', 'mail', 'account_created', 'last_login', 'online', 'pincode', 'last_online' ,'motto' ,'look' ,'gender' ,'rank', 'credits', 'auth_ticket', 'ip_register', 'ip_current', 'machine_id', 'secret_code'];

    protected $validationRules = [
        'username' => 'required|min_length[4]|max_length[20]|pattern[[a-zA-Z0-9-=?!@:.]+]',
        'email' => 'required|valid_email|is_unique[users.mail]',
        'password' => 'required|min_length[6]',
        'password_confirmation'=> 'required|matches[password]',
        'gender' => 'pattern[^(?:MORF)$]'
    ];
    
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'User.email.is_unique'
        ],
        'password_confirmation' => [
            'required' => 'User.password_confirmation.required',
            'matches' => 'User.password_confirmation.matches'
        ]
    ];
    
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password_confirmation']);
        }
        
        return $data;
    }
  
    public function disablePasswordValidation()
    {
        unset($this->validationRules['password']);
        unset($this->validationRules['password_confirmation']);
    }
  
    public function findByUsername(string $username, string $param = null)
    {
        return $this->select($param ?? '*')->where('username', $username)->first();
    }
  
    public function findById(int $user_id, string $param = null)
    {
        return $this->select($param ?? '*')->where('id', $user_id)->first();
    }

    public function getDataByRank(int $rank, int $limit = 10)
    {
        $this->select('users.id, users.username, users.rank, users.online, users.look, users.motto, permissions.rank_name');
        $this->join('permissions', 'permissions.id = users.rank');
        return $this->where('rank', $rank)->orderBy('rank', 'DESC')->get()->getResultArray();
    }

}