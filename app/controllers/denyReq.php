<?php

namespace Controller;

class DenyReq{

    public function get()
{

        echo \View\Loader::make()->render("templates/book.twig", array(
            "booksAvailable" => \Model\Book::findAvailable(),

        ));
    
}
    public function post(){
        session_start();
        if (!isset($_SESSION["Role"])) {
            echo \View\Loader::make()->render("templates/home.twig");
          } else {

        $bookName = $_POST["bookName"];
        $username = $_POST["username"];
    
        \Model\Book::denyReq($bookName,$username);
       
     
    echo \View\Loader::make()->render("templates/admin.twig", array(
        "confirm" => "Denied request",
        "requests" => \Model\Book::requests(),
        "booksAvailable" => \Model\Book::findAvailable(),
     ));

    }
}

}
