<?php

require_once 'config_db.php';
if(isset($_POST["name"])) {
 $name = trim($_POST["name"]);

 if(!empty($name)){
   $addedQuery = $connect->prepare(
   "INSERT INTO tasks(name, user, done)
   VALUES (:name, :user, 0)");

   $addedQuery->execute([
     "name"=>$name,
     "user"=> $_SESSION['user_id']
   ]);
  }
 }

header('location: ../php/planner.php')
 ?>
