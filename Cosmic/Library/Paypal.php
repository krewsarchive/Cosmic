<?php
namespace Library;

use App\Config;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class Paypal
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    public static function environment()
    {
        return new SandboxEnvironment(Config::paypal_client_id, Config::paypal_secret_id);
    }
}