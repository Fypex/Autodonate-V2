<?php

namespace Controllers\auth;

use Controllers\Controller;
use Flight;
use Models\Users;

class AuthController extends Controller
{
    public function login_page(){

        if (!empty($_SESSION['user'])){
            Flight::redirect('/dashboard');
        }else{
            Flight::render('login');
        }
    }

    public function register_page(){
        if (!empty($_SESSION['user'])){
            Flight::redirect('/dashboard');
        }else{
            Flight::render('register');
        }
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();
        Flight::redirect('/login');
    }

    public function register(){
        $request = Flight::request()->data;

        $this->validate_login($request->login);
        $this->validate_email($request->email);
        $this->validate_password($request->password, $request->password_repeat);

        $response = Users::register(trim($request->login), trim($request->email), password_hash(trim($request->password), PASSWORD_DEFAULT));
        if ($response){
            Controller::response(200,'redirect');
        }
    }

    public function login(){
        $request = Flight::request()->data;

        $user = Users::get_user_login(trim($request->login));

        if (empty($user['login'])){
            Controller::response(400,'Не верный логин или пароль');
            exit;
        }

        if (!empty($user['login'])){

            if (password_verify($request->password, $user['password'])){

                unset($user['password']);

                $_SESSION['user'] = $user;

            }else{
                Controller::response(400,'Не верный логин или пароль');
                exit;
            }

        }
        exit;

    }

    private function validate_login($login){

        if (empty(trim($login))){
            Controller::response(400,'Введите логин');
            exit;
        }


        if (!preg_match('/^[a-zA-Z0-9_]+$/i', trim($login))){
            Controller::response(400,'Только латиница, цифры и нижнее подчеркивание');
            exit;
        }

        $user = Users::get_user_login(trim($login));

        if ($user){
            Controller::response(400,'Логин занят');
            exit;
        }

    }

    private function validate_email($email){


        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            Controller::response(400,'Неверный почтовый адрес');
            exit;
        }

        $user = Users::get_user_email(trim($email));

        if ($user){
            Controller::response(400,'Такая почта уже зарегистрирована');
            exit;
        }
    }

    private function validate_password($password, $password_repeat){
        if (empty($password) or empty($password_repeat)){
            Controller::response(400,'Введите пароль');
            exit;
        }

        if (trim($password) != trim($password_repeat)){
            Controller::response(400,'Пароли не совпадают');
            exit;
        }
    }

    public static function auth(){

        $access = [];
        foreach (Flight::router()->getRoutes() as $key => $route){

            $access[$key] = [$route->pattern => $route->pass];

        }
        if (!empty($access[$_SERVER['PATH_INFO']])){
            $user = Users::get_user_login($_SESSION['user']['login']);
            $roles = explode('|',$access[$_SERVER['PATH_INFO']]);
            $count = 0;
            foreach ($roles as $role){
                if($user['role'] == $role){
                    $count++;
                }
            }
            if ($count == 0){
                Flight::render('errors/404');
                exit;
            }
        }
    }

}