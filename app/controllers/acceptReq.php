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
  
    \Model\Book::setStatus($bookName,$username);
    \Model\Book:: setStartDate($bookName,$username);
    \Model\Book::updateNumber($bookName);
    
  
    echo \View\Loader::make()->render("templates/admin.twig", array(
        "confirm" => "Accepted request",
        "requests" => \Model\Book::requests(),
        "booksAvailable" => \Model\Book::findAvailable(),
     ));

    }

}
}