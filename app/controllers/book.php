<?php

namespace Controller;

class Book{
public function get()
{

        echo \View\Loader::make()->render("templates/book.twig", array(
            "booksAvailable" => \Model\Book::findAvailable(),

        ));
    
}

public function post()
    {
        session_start();

         if (!isset($_SESSION["Role"])) {
           echo \View\Loader::make()->render("templates/home.twig");
         }
         else {

            $bookName = $_POST["bookName"];
            $number = $_POST["number"];

            if ($number < 0) {

                echo \View\Loader::make()->render("templates/admin.twig", array(
                    "invalidData" => true,
                    "bookData" =>  \Model\Book::findAvailable(),

                ));
            } else {
                \Model\Book::addBookData($bookName, $number);
                echo "added book data";

                 echo \View\Loader::make()->render("templates/home.twig", array(
                 ));
            }
        }
    
    }


}
