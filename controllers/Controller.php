<?php

namespace Controllers;

use Flight;

class Controller
{

    static public function response($code, $message){

        Flight::halt($code, $message);

    }

}