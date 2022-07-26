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

        $requestedBook = \Model\Book::requestedBook($username);
       
        $availableBook = \Model\Book::booksLeft($bookName);

        if($availableBook['number'] == 0){
            \Model\Book::denyReq($bookName,$username);
            
            echo \View\Loader::make()->render("templates/client.twig", array(
                "error" => "No books available",
                "client" => \Model\Client::verifyLogin($username),
                "booksAvailable" => \Model\Book::findAvailable(),
                "myBooks" =>  \Model\Book::myBooks($username),
                "myRequests" =>  \Model\Book::myRequests($username),
             ));
        }else{
    foreach ($requestedBook as $value) {
        if ($bookName == $value[0]){
           

            echo \View\Loader::make()->render("templates/client.twig", array(
                "error" => "Already Checked in",
                "client" => \Model\Client::verifyLogin($username),
                "booksAvailable" => \Model\Book::findAvailable(),
                "myBooks" =>  \Model\Book::myBooks($username),
                "myRequests" =>  \Model\Book::myRequests($username),
                ));
                return;
        }
    }
    
        
      

        \Model\Book::checkIn($bookName,$username);

      

        echo \View\Loader::make()->render("templates/client.twig", array(
            "confirm" => "Check in request sent",
            "client" => \Model\Client::verifyLogin($username),
            "booksAvailable" => \Model\Book::findAvailable(),
            "myBooks" =>  \Model\Book::myBooks($username),
            "myRequests" =>  \Model\Book::myRequests($username),
            ));
        
        }
    

}
}