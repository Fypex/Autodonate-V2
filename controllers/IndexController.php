<?php

namespace Controllers;

use Flight;
use Models\Privilege;

class IndexController
{
    public function index(){


        Flight::render('index', array(
            'server_ip' => settings()['server']['ip'],
            'links' => settings()['links'],
            'widget' => settings()['widget'],
            'contacts' => settings()['contacts'],
            'products' => Privilege::get(),
        ));

    }
}