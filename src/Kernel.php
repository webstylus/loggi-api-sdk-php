<?php

namespace Lojazone\Loggi;

class Kernel
{
    public static function boot()
    {
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}