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
        $ID = $_POST["ID"];

        $availableBook = \Model\Book::findAvailable();
        $bookData =  \Model\Book::bookData();
        foreach ($availableBook as $value){
            if($value[0]==$bookName){
                $number = $value[1];
            }
        }

        if($number == 0){
            \Model\Book::denyReq($ID,$username);
            
            echo \View\Loader::make()->render("templates/client.twig", array(
                "error" => "No books available",
                "client" => \Model\Client::verifyLogin($username),
                "booksAvailable" => \Model\Book::findAvailable(),
                "bookData" =>  \Model\Book::bookData(),
             ));
        }else{
         
            foreach ($bookData as $value) {
                if ($bookName == $value[5] && $username == $value[1]){
                

                    echo \View\Loader::make()->render("templates/client.twig", array(
                        "error" => "Already Checked in",
                        "client" => \Model\Client::verifyLogin($username),
                        "booksAvailable" => \Model\Book::findAvailable(),
                        "bookData" =>  \Model\Book::bookData(),
                        ));
                        return;
                }
            }
            
                
            
                \Model\Book::checkIn($ID,$username);

            

                echo \View\Loader::make()->render("templates/client.twig", array(
                    "confirm" => "Check in request sent",
                    "client" => \Model\Client::verifyLogin($username),
                    "booksAvailable" => \Model\Book::findAvailable(),
                    "bookData" =>  \Model\Book::bookData(),
                    ));
                
                }
            

        }
}