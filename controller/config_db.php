<?php
session_start();
//$_SESSION["user_id"] = $user['id'];

$connect = new PDO("mysql:host=localhost;dbname=todo_db", "root", "root");

if (!$connect){
  die("Error with connection to DataBase.");
}
 ?>
