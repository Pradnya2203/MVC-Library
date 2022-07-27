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

  public static function addBookData($bookName, $quantity,$ID)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO Book (bookName, quantity,ID) VALUES (?,?,?)");
    $stmt->execute([$bookName, $quantity,$ID]);
    $result = $stmt->fetchAll();
    return $result;
  }

  public static function bookData()
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("SELECT * FROM record JOIN Book USING (ID) ");
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



  public static function checkIn($ID,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("INSERT INTO record (ID,username) VALUES (?,?)");
    return $stmt->execute([$ID, $username]);
    
  }

  public static function updateBook($ID)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE Book SET quantity=quantity+1 WHERE ID='$ID'");
    return $stmt->execute([$ID]);
  }

  public static function deleteBook($ID,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("DELETE FROM record WHERE username='$username' AND ID='$ID' ");
    return $stmt->execute([$bookName, $username]);
  }

  public static function setDate($ID,$username)
  {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE record SET  returned_on='$date' WHERE username='$username' AND ID='$ID'");
    return $stmt->execute([$date,$ID, $username]);
    
  }

  public static function setFine($username,$fine){
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE client SET fine=fine+$fine WHERE username='$username'");
    return $stmt->execute([$username, $fine]);
    
  }


  
  public static function setStartDate($ID,$username)
  {
    $db = \DB::get_instance();
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-y h:i:s');
    $stmt = $db->prepare("UPDATE record SET issued_on='$date', status = '1' WHERE username='$username' AND ID='$ID'");
    return $stmt->execute([$date,$ID, $username]);
    
  }

  
  public static function updateNumber($bookName)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("UPDATE Book SET quantity=quantity-1 WHERE bookName='$bookName'");
    return $stmt->execute([$bookName]);
    
  }


  public static function denyReq($ID,$username)
  {
    $db = \DB::get_instance();
    $stmt = $db->prepare("DELETE FROM record WHERE username='$username' AND ID='$ID'");
    return $stmt->execute([$ID, $username]);
    
  }



}