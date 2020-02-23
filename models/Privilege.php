<?php

namespace Models;

class Privilege extends DB
{

    static public function create($privilege_fields){

        $privilege = Privilege::pdo()->prepare('
            INSERT INTO privileges(
              name, command, price, discount, 
              period, amount_days, reset_command, 
              created, updated
            )
            VALUES(?, ?, ?, ?,?, ?, ?, ?, ?);
        ');

       return $privilege->execute([
            $privilege_fields->name,
            $privilege_fields->command,
            $privilege_fields->price_field,
            $privilege_fields->discount_field,
            $privilege_fields->issuing_period_field,
            $privilege_fields->amount_days,
            $privilege_fields->reset_command,
            time(),
            time(),
        ]);

    }

    static public function update($privilege_fields){

        $privilege = Privilege::pdo()->prepare('
            UPDATE privileges
            SET name = ?, command = ?, price = ?, discount = ?, period = ?, amount_days = ?, reset_command = ?, updated =?
            WHERE id = ?
        ');

        return $privilege->execute([
            $privilege_fields->name,
            $privilege_fields->command,
            $privilege_fields->price_field,
            $privilege_fields->discount_field,
            $privilege_fields->issuing_period_field,
            $privilege_fields->amount_days,
            $privilege_fields->reset_command,
            time(),
            $privilege_fields->id
        ]);

    }


    static public function get(){

        $privilege = Privilege::pdo()->query('SELECT * FROM privileges');
        return $privilege->fetchAll();

    }

    static public function getOne($id){

        $privilege = Privilege::pdo()->prepare('SELECT * FROM privileges WHERE id = ? LIMIT 1');
        $privilege->execute([$id]);
        return $privilege->fetch();

    }

    static public function delete($id){

        $tickets = Privilege::pdo()->prepare("
          DELETE FROM privileges
          WHERE id = ? LIMIT 1");
        return $tickets->execute([$id]);

    }


}