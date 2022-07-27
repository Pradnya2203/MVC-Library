<?php

namespace Model;

class Client {
 
    public static function createUser($name, $username, $password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO client (name, username ,password) VALUES (?,?,?)");
        $stmt->execute([$name, $username, $password]);
        return;
    }

    public static function verifyLogin($username)
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare("SELECT * FROM client WHERE username= ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
    }
 


}