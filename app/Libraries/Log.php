<?php
namespace App\Libraries;

class Log
{
    public static $levels = array(
        E_ERROR             => 'Error',
        E_WARNING           => 'Warning',
        E_PARSE             => 'Parsing Error',
        E_NOTICE            => 'Notice',
        E_CORE_ERROR        => 'Core Error',
        E_CORE_WARNING      => 'Core Warning',
        E_COMPILE_ERROR     => 'Compile Error',
        E_COMPILE_WARNING   => 'Compile Warning',
        E_USER_ERROR        => 'User Error',
        E_USER_WARNING      => 'User Warning',
        E_USER_NOTICE       => 'User Notice',
        E_STRICT            => 'Runtime Notice',
        E_RECOVERABLE_ERROR => 'Catchable error',
        E_DEPRECATED        => 'Runtime Notice',
        E_USER_DEPRECATED   => 'User Warning'
    );

    public static function insert($severity, $message, $target = -1)
    {
        $database = \Config\Database::connect();
        $service = service('request');
      
        $data = array(
            'type'        => isset(static::$levels[$severity]) ? static::$levels[$severity] : $severity,
            'target'      => $target,
            'message'     => $message,
            'ip_address'  => $service->getIPAddress(),
            'timestamp'   => time()
        );

        $database->table('website_logs')->insert($data);
    }
}