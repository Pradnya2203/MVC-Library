<?php

namespace Controller;


class Client {

    public function get() {
        echo \View\Loader::make()->render("templates/home.twig");
    }

    public function post()
    {
        session_start();

        $username = $_POST["username"];
        $password = $_POST["password"]; 
        $result = \Model\Client::verifyLogin($username);

        if ($result['username'] == null || $result['password'] == null) {
            echo "enter user details";
            echo \View\Loader::make()->render("templates/home.twig");

        } 
        else if (hash("sha512", $password) === $result['password'] && $result['admin'] == 1)  {

            $_SESSION["username"] = $username;
            $_SESSION["Role"] = "Admin";
                echo \View\Loader::make()->render("templates/admin.twig",array(
                    "requests" => \Model\Book::requests(),
                    "booksAvailable" => \Model\Book::findAvailable(),
                ));
            }
        else if(hash("sha512", $password) === $result['password'] ){
            $_SESSION["username"] = $username;
            echo \View\Loader::make()->render("templates/client.twig", array(
                "client" => \Model\Client::verifyLogin($username,$password),
                "booksAvailable" => \Model\Book::findAvailable(),
                "myBooks" =>  \Model\Book::myBooks($username),
                "myRequests" =>  \Model\Book::myRequests($username),
                ));
            
        } else {
            
            echo \View\Loader::make()->render("templates/home.twig", array(
                "error" => "Wrong Password"
            
            ));
        }
    }
}

