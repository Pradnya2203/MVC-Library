<?php

namespace Model;


class Book
{

  public static function findAvailable()
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM Book");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }

  public static function addBookData($bookName, $number,$ID)
  {

    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO Book (bookName, number,ID) VALUES (?,?,?)");
    $stmt->execute([$bookName, $number,$ID]);

    return;
  }

  public static function requests()
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM books");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }


  public static function ID()
  {
    
        $db = \DB::get_instance();

        $stmt = $db->prepare("SELECT ID FROM Book");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
  }



  public static function checkIn($bookName,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO books (bookName,username) VALUES (?,?)");
    $stmt->execute([$bookName, $username]);
    return;
  }

  public static function updateBook($bookName)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE Book SET number=number+1 WHERE bookName='$bookName'");
    $stmt->execute([$bookName]);
    return;
  }

  public static function deleteBook($bookName,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("DELETE FROM books WHERE username='$username' AND bookName='$bookName' ");
    $stmt->execute([$bookName, $username]);
    return;
  }

  public static function setDate($bookName,$username)
  {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE books SET  returned_on='$date' WHERE username='$username' AND bookName='$bookName'");
    $stmt->execute([$date,$bookName, $username]);
    return;
  }

  public static function setFine($username,$fine){
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE client SET fine=fine+$fine WHERE username='$username'");
    $stmt->execute([$username, $fine]);
    return;
  }

  public static function setStatus($bookName,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE books SET status='1' WHERE username='$username' AND bookName='$bookName'");
    $stmt->execute([$bookName, $username]);
    return;
  }

  
  public static function setStartDate($bookName,$username)
  {
    $db = \DB::get_instance();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $stmt = $db->prepare("UPDATE books SET issued_on='$date' WHERE username='$username' AND bookName='$bookName'");
    $stmt->execute([$date,$bookName, $username]);
    return;
  }

  
  public static function updateNumber($bookName)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE Book SET number=number-1 WHERE bookName='$bookName'");
    $stmt->execute([$bookName]);
    return;
  }


  public static function denyReq($bookName,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("DELETE FROM books WHERE username='$username' AND bookName='$bookName'");
    $stmt->execute([$bookName, $username]);
    return;
  }

  public static function books($username){
    $db = \DB::get_instance();
    $stmt = $db->prepare(" SELECT bookName,status FROM books JOIN Book USING (bookName) WHERE username='$username';");
    $stmt->execute([$username]);
    return;
  }

}