<?php


namespace Controllers\panel;


use Controllers\Controller;
use Flight;
use Models\Privilege;

class PrivilegesController
{

    public function index(){

    }

    public function create(){
        $request = Flight::request()->data;

        if (empty($request->id)){
            $data = Privilege::create($request);

            if ($data){
                Controller::response(200,'redirect');
            }else{
                Controller::response(400, $data);
            }

        }else{
            $data = Privilege::update($request);

            if ($data){
                Controller::response(200,'redirect');
            }else{
                Controller::response(400,'Что-то пошло не так(');
            }
        }


    }

    public function get(){

        echo json_encode(Privilege::getOne(Flight::request()->data->id));

    }

    public function delete(){

        Privilege::delete(Flight::request()->data->id);

    }

}