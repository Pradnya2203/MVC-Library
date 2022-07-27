<?php

namespace Controller;

class AcceptReq{

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
    $ID = $_POST["ID"];
  
    
    \Model\Book:: setStartDate($ID,$username);
    \Model\Book::updateNumber($bookName);

    
  
    echo \View\Loader::make()->render("templates/admin.twig", array(
        "confirm" => "Accepted request",
        "bookData" => \Model\Book::bookData(),
        "booksAvailable" => \Model\Book::findAvailable(),
     ));

    }

}
}