<?php

namespace Controller;

class AcceptReq{
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
    echo "Accepted request";
    echo \View\Loader::make()->render("templates/home.twig");

    }
}
}