<?php
session_start();
require_once 'config_db.php';

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);

$password = trim($_POST["password"]);


if(strlen($username) < 5){
    $_SESSION["message"]="Write your full name please";
    exit();
}
else if(strlen($email) <= 0){
    $_SESSION["message"]="Write your email please";
    exit();
}
else if(strlen($password) < 5){
    $_SESSION["message"]="Password must be more than 5 characters";
    exit();
}
else{
  $_SESSION["message"]= "Registration has been completed successfully!<br>Now you can login to access.";
}


$regQuery= $connect->prepare(
  "INSERT INTO users (username, email, password)
   VALUES(:username, :email, :password)");

$regQuery->execute([
  "username"=>$username,
  "email"=>$email,
  "password"=>$password
]);
header('location: ../php/login.php')

 ?>
