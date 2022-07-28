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
            $ID = $_POST["ID"];
            $id = \Model\Book::ID();
            $bookData = \Model\Book::bookData();
            $booksAvailable = \Model\Book::findAvailable();
       
     
            foreach ($Book as $value) {
                if ($id == $value[0]){
        
                    echo \View\Loader::make()->render("templates/admin.twig", array(
                        "error" => "Book is already present in Library",
                        "bookData" => $bookData,
                        "booksAvailable" => $booksAvailable,
                     ));
                        return;
                }
            }
            
            if ($number < 0 || $ID < 0) {
              
                echo \View\Loader::make()->render("templates/admin.twig", array(
                    "error" => "enter a valid number or id",
                    "bookData" => $bookData,
                    "booksAvailable" => $booksAvailable,
                   
                 ));
            } else {
                \Model\Book::addBookData($bookName, $number,$ID);

                 echo \View\Loader::make()->render("templates/admin.twig", array(
                    "confirm" => "added book data",
                    "bookData" => $bookData,
                    "booksAvailable" => $booksAvailable,
                 ));
            }
        }
    
    }


}
