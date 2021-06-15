<?php 
namespace App\Controllers\Settings;

class Preferences extends \App\Controllers\Application
{  
    public function __construct()
    {
        parent::__construct();
        $this->userSettingsModel = model('UserSettingsModel');
    }
  
    public function save()
    {
        $inArray = array(
            'block_following',
            'block_friendrequests',
            'block_roominvites',
            'old_chat',
            'block_alerts'
        );
      
        foreach($inArray as $key) { 
            $value = (int)filter_var($this->request->getVar($key), FILTER_VALIDATE_BOOLEAN);
            $this->userSettingsModel->set([$key => "{$value}"])->where('user_id', $this->user->id)->update();
        }
      
        return redirect()->to('/settings')->with('success', 'Instellingen zijn opgeslagen!');
    }
  
    public function view()
    { 
        $settings = $this->userSettingsModel->where('user_id', $this->user->id)->first();
        return $this->render('settings/preferences', ['settings' => $settings, 'nav' => 'preferences']);
    }
  
}