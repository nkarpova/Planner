<?php
require_once 'config_db.php';
$id = $_GET["id"];


   $deletedQuery = "DELETE FROM tasks
   WHERE id = '$id'";

  $val = $connect->query($deletedQuery);
  if($val){

header('location: ../php/planner.php');

};

?>
