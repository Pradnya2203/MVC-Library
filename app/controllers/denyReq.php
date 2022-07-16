<?php

namespace Controller;

class DenyReq{

    public function post(){
        session_start();
        if (!isset($_SESSION["Role"])) {
            echo \View\Loader::make()->render("templates/home.twig");
          } else {

        $bookName = $_POST["bookName"];
        $username = $_POST["username"];
    
        \Model\Book::denyReq($bookName,$username);
        echo "Denied request";
    echo \View\Loader::make()->render("templates/home.twig");
    }
}

}
