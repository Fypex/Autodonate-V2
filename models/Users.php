<?php 

namespace Models;

class Users extends DB
{

    static public function get_user_email($email){

        $user = Users::pdo()->prepare('
          SELECT * FROM users
          LEFT JOIN users_role on users_role.user_id = users.id
          LEFT JOIN roles on roles.id = users_role.role_id
          LEFT JOIN money on money.id = users.id
          WHERE users.email = ?');
        $user->execute([$email]);
        return $user->fetch();

    }

    static public function get_user_id($id){

        $user = Users::pdo()->prepare('
          SELECT * FROM users
          LEFT JOIN users_role on users_role.user_id = users.id
          LEFT JOIN roles on roles.id = users_role.role_id
          LEFT JOIN money on money.id = users.id
          WHERE users.id = ?');
        $user->execute([$id]);
        return $user->fetch();

    }

    static public function get_user_login($login){

        $user = Users::pdo()->prepare('
          SELECT * FROM users
          LEFT JOIN users_role on users_role.user_id = users.id
          LEFT JOIN roles on roles.id = users_role.role_id
          LEFT JOIN money on money.user_id = users.id
          WHERE users.login = ?');
        $user->execute([$login]);
        return $user->fetch();

    }

    static public function register($login, $email, $password){

        $user = Users::pdo()->prepare('
          INSERT INTO users(login, email, password ,role, money, created, updated) 
          VALUES(?, ?, ?, ?,?, ?, ?);
         ');

        return $user->execute([$login, $email, $password, 'user', 0, time(), time()]);

    }

    static public function update_money($user_id, $money){

        $user = Users::pdo()->prepare('INSERT INTO money(user_id, amount) VALUES(?, ?) ON DUPLICATE KEY UPDATE amount = amount + ?');
        return $user->execute([$user_id, $money, $money]);

    }


}
