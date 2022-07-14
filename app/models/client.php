<?php

namespace Model;

class Client {
 
    public static function createUser($Name, $Username, $Password)
    {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO client (Name, Username ,Password) VALUES (?,?,?)");
        $stmt->execute([$Name, $Username, $Password]);
    }

    public static function verifyLogin($Username, $Password)
    {
        $db = \DB::get_instance();

        $stmt = $db->prepare("SELECT * FROM client WHERE username= ?");
        $stmt->execute([$Username]);

        $Result = $stmt->fetch();
        return $Result;
    }
 


}