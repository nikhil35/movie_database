<?php
if(!isset($_SESSION)) 
    {
session_start();
}
 $db_host = "localhost";
 $db_password = "";
 $db_user = "root";
 $db_name = "movies";

 try {
     $db_con = new PDO ("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
     $db_con->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
     echo $e->getMessage();
}


include_once 'classUser.php';
$user = new USER($db_con);
 