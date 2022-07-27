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
        $ID = $_POST["ID"];
        
        $bookData = \Model\Book::bookData();
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');

        foreach($bookData as $value){
            if($value[5] == $bookName && $value[1] == $username){
                $Date = $value[3];
            }
        }
        echo $Date;
        $fine = (($date-$Date)/1000*60*60*24)-7;
        if($fine <=0){
            $fine=0;
        }
        echo $fine;

        \Model\Book::setDate($ID,$username);
        \Model\Book::deleteBook($ID,$username);
        \Model\Book::setFine($username,$fine);
        \Model\Book::updateBook($ID);
       

        echo \View\Loader::make()->render("templates/client.twig", array(
            "confirm" => "$bookName Checked Out",
            "client" => \Model\Client::verifyLogin($username),
            "booksAvailable" => \Model\Book::findAvailable(),
            "bookData" =>  \Model\Book::bookData(),
            
            ));
    }

}
