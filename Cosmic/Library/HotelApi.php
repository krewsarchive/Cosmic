<?php
namespace Library;

use App\Models\Core;
use Library\RconException;
use Origin\Socket\Socket;

class HotelApi {
  
    public $result = [];
  
    public $socket;
    public $settings;
  
    public $serverPort;
    public $serverHost;
    public $timeout;
    public $protocol;
  
    public function __construct()
    {
        $this->settings = Core::settings();
      
        $rcon_api_timeout = filter_var(Core::settings()->rcon_api_timeout, FILTER_VALIDATE_BOOLEAN); 
      
        $this->socket = new Socket([
            'host' => (string)$this->settings->rcon_api_host,
            'protocol' => (string)$this->settings->rcon_api_protocol,
            'port' => (int)$this->settings->rcon_api_port,
            'timeout' => (int)$this->settings->rcon_api_timeout,
            'persistent' => $rcon_api_timeout,
        ]);
    }
  
    public static function flatten($array)
    {
        foreach($array as $key => $value) 
        {
            $result = (is_array($value)) ? $result + self::flatten($value) : $value;
        }
        return $result;
    }
  
    public function send($command)
    {
        if ($this->socket->connect()) {
            $this->socket->write($command);
            $result = $this->socket->read();
        }
    
        $this->socket->disconnect();
        return response()->json(["status" => "error", "message" => $result]);
    }
  
    public static function execute($param, $data = null, $merge = false)
    {
        $command = json_encode(['key' => $param, 'data' => ($merge == true) ? self::flatten($data) : $data]);
        return (new self)->send($command);
    }
}
  
