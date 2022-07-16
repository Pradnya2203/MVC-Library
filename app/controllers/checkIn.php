<?php

namespace Controller;

class CheckIn{
    

    public function post()
    {
        $bookName = $_POST["bookName"];
        $username = $_POST["username"];
        \Model\Book::checkIn($bookName,$username);
        echo "Check in request sent";

        echo \View\Loader::make()->render("templates/home.twig");
    }

}