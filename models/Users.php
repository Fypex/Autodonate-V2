<?php 

namespace Models;

use \RedBeanPHP\R as R;

class Users extends R
{

    static public function get_user_email($email){

       return Users::findOne('users','email = ?', [$email]);

    }

    static public function get_user_login($login){

        return Users::findOne('users', 'login = ?', [$login]);

    }

    static public function register($login, $email, $password){

        $user = Users::dispense('users');

        $user->login = $login;
        $user->email = $email;
        $user->password = $password;

        return Users::store($user);

    }

}
