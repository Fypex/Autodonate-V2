<?php

namespace Controllers;

use thedudeguy\Rcon;

class RconController
{

    public static function command($command)
    {
        $settings = settings()['rcon'];

        $host = $settings['ip'];
        $port = $settings['port'];
        $password = $settings['password'];
        $timeout = 3;


        $rcon = new Rcon($host, $port, $password, $timeout);

        if ($rcon->connect())
        {
            $rcon->send_command($command);
        }
    }
}