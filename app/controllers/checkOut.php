<?php

namespace Controller;

class CheckOut{

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
        
        $books = \Model\Book::requests();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');

        foreach($books as $value){
            if($value[0] == $bookName && $value[1] == $username){
                $Date = $value[3];
            }
        }

        $fine = (($date-$Date[3])/1000*60*60*24)-7;
        if($fine <=0){
            $fine=0;
        }

        \Model\Book::setDate($bookName,$username);
        \Model\Book::deleteBook($bookName,$username);
        \Model\Book::setFine($bookName,$fine);
        \Model\Book::updateBook($bookName);
       

        echo \View\Loader::make()->render("templates/client.twig", array(
            "confirm" => "$bookName Checked Out",
            "client" => \Model\Client::verifyLogin($username,$password),
            "booksAvailable" => \Model\Book::findAvailable(),
            "requests" =>  \Model\Book::requests(),
            
            ));
    }

}
