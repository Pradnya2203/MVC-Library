<?php

namespace Controller;

class Register {
    
    public function get() {
        
        echo \View\Loader::make()->render("templates/register.twig");
      }
    public function post()
    {
        session_start();
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = hash("sha512", $password);

        \Model\Client::createUser($name, $username, $password);
       
        echo \View\Loader::make()->render("templates/home.twig",array(
            "confirm" => "$name registered",
        ));
        session_destroy();
    }

}
