<?php

namespace Controller;

class CheckOut{

    public function post()
    {
        $bookName = $_POST["bookName"];
        $username = $_POST["username"];
        
        $books = \Model\Book::booksData($username,$bookName);
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y h:i:s');

        $fine = (($date-$books[3])/1000*60*60*24)-7;
        if($fine <=0){
            $fine=0;
        }

        \Model\Book::setDate($bookName,$username);
        \Model\Book::deleteBook($bookName,$username);
        \Model\Book::setFine($bookName,$fine);
        \Model\Book::updateBook($bookName);
    
        echo "$bookName Checked Out";
        echo \View\Loader::make()->render("templates/home.twig");
    }

}
