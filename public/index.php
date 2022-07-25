<?php

require __DIR__."/../vendor/autoload.php";

ToroHook::add("404",  function() 
{
    header('HTTP/1.1 404 Not Found');
    echo \View\Loader::make()->render
            (  
            "templates/notFound.twig" ,
            );
    exit;
}
);

Toro::serve(array(
    "/" => "\Controller\Home",
    "/register" => "\Controller\Register",
    "/client" => "\Controller\Client",
    "/addBook" => "\Controller\Book",
    "/availablebook" => "\Controller\Book",
    "/checkIn" => "\Controller\CheckIn",
    "/checkOut" => "\Controller\CheckOut",
    "/acceptReq" => "\Controller\AcceptReq",
    "/denyReq" => "\Controller\DenyReq",
    
   
));
