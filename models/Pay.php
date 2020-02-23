<?php

namespace Models;

class Pay extends DB
{

    public static function getPurchase($id){

        $payment = Pay::pdo()->prepare('SELECT * FROM purchases WHERE uniqid = ? AND status = ? LIMIT 1');
        $payment->execute([$id, 0]);
        return $payment->fetch();

    }

    public static function addPurchase($id, $system_id, $login, $amount, $timestamp)
    {

        $purchase = Privilege::pdo()->prepare('
            INSERT INTO purchases(uniqid, payment_id, login, amount, timestamp, status)
            VALUES(?, ?, ?, ?, ?, ?)
        ');

        return $purchase->execute([
            $id,
            $system_id,
            $login,
            $amount,
            $timestamp,
            0
        ]);

    }

    public static function payment($array)
    {

        $system = self::getPayment($array['system']);
        if ($system){

            $payment = Pay::pdo()->prepare('
            UPDATE payment_systems
            SET status = ?, secret_key = ?, public = ?
            WHERE id = ?');

            $payment->execute([$array['status'], $array['key'], $array['shop'], $system['id']]);

        }else{

            $privilege = Privilege::pdo()->prepare('
            INSERT INTO payment_systems(system, status, secret_key, public)
            VALUES(?, ?, ?, ?);
            
        ');

            return $privilege->execute([
                $array['system'],
                $array['status'],
                $array['key'],
                $array['shop'],
            ]);

        }


    }


    public static function getPayment($system)
    {

        $payment = Pay::pdo()->prepare('SELECT * FROM payment_systems WHERE system = ? LIMIT 1');
        $payment->execute([$system]);
        return $payment->fetch();

    }

    public static function getPayments()
    {

        $payments = Pay::pdo()->prepare('SELECT * FROM payment_systems WHERE status = ?');
        $payments->execute(['on']);
        return $payments->fetchAll();

    }

    public static function updatePurchase($id, $status)
    {


        $payment = Pay::pdo()->prepare('
            UPDATE purchases
            SET status = ?
            WHERE id = ?');

        $payment->execute([$status, $id]);


    }

}