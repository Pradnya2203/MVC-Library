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

        $requests = \Model\Book::requests($username);
       
        $availableBook = \Model\Book::findAvailable();
        
        foreach ($availableBook as $value){
            if($value[0]==$bookName){
                $number = $value[1];
            }
        }

        if($number == 0){
            \Model\Book::denyReq($bookName,$username);
            
            echo \View\Loader::make()->render("templates/client.twig", array(
                "error" => "No books available",
                "client" => \Model\Client::verifyLogin($username),
                "booksAvailable" => \Model\Book::findAvailable(),
                "requests" =>  \Model\Book::requests(),
             ));
        }else{
    foreach ($requests as $value) {
        if ($bookName == $value[0] && $username == $value[1]){
           

            echo \View\Loader::make()->render("templates/client.twig", array(
                "error" => "Already Checked in",
                "client" => \Model\Client::verifyLogin($username),
                "booksAvailable" => \Model\Book::findAvailable(),
                "requests" =>  \Model\Book::requests(),
                ));
                return;
        }
    }
    
        
      

        \Model\Book::checkIn($bookName,$username);

      

        echo \View\Loader::make()->render("templates/client.twig", array(
            "confirm" => "Check in request sent",
            "client" => \Model\Client::verifyLogin($username),
            "booksAvailable" => \Model\Book::findAvailable(),
            "requests" =>  \Model\Book::requests(),
            ));
        
        }
    

}
}