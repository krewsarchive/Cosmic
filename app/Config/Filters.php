<?php 
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $aliases = [
        'csrf'     => \CodeIgniter\Filters\CSRF::class,
        'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot' => \CodeIgniter\Filters\Honeypot::class,
        'LoginFilter'    => \App\Filters\LoginFilter::class,
        'GuestFilter'    => \App\Filters\GuestFilter::class,
        'AdminFilter'    => \App\Filters\AdminFilter::class
    ];


    public $globals = [
        'before' => [
            'csrf',
        ],
        'after'  => [
            'toolbar',
        ],
    ];

    public $methods = [];

    public $filters = [
        'LoginFilter' => [
            'before' => [
                'auth/logout',
                'auth/login/housekeeping',
                'auth/account/create',
                'community/*',
                'settings/*',
                'me/*'
            ]
        ],
        'GuestFilter' => [
            'before' => [
                'auth/login',
                'register'
            ]
        ],
        'AdminFilter' => [
            'before' => [
                'housekeeping',
                'housekeeping/*'
            ]
        ],
    ];
}