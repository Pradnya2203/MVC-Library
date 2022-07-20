<?php

namespace Controller;

class CheckIn{
    

    public function get()
    {

        echo \View\Loader::make()->render("templates/book.twig", array(
            "booksAvailable" => \Model\Book::findAvailable(),

        ));
    
    }

    public function post()
    {
        session_start();
        $bookName = $_POST["bookName"];
        $username = $_POST["username"];
        \Model\Book::checkIn($bookName,$username);
        echo "Check in request sent";

        echo \View\Loader::make()->render("templates/client.twig", array(
            "client" => \Model\Client::verifyLogin($username,$password),
            "booksAvailable" => \Model\Book::findAvailable(),
            "myBooks" =>  \Model\Book::myBooks($username),
            ));
    }

}