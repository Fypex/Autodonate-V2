<?php

namespace Controllers\panel;

use Controllers\auth\AuthController;
use Flight;
use Models\Privilege;

class PanelController extends AuthController
{

    public function index(){

        $privileges = Privilege::get();
        Flight::render('panel/index', ['privileges' => $privileges]);

    }

}