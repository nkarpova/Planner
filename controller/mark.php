<?php
require_once 'config_db.php';
if(isset($_GET["as"], $_GET["task"])){
  $as = $_GET["as"];
  $task = $_GET["task"];

  switch($as){
    case "done":
      $doneQuery = $connect->prepare("UPDATE tasks
        SET done = 1
        WHERE id = :task
        AND user = :user
      ");

      $doneQuery->execute([
        "task" => $task,
        "user" => $_SESSION["user_id"]
      ]);
      break;
  }
}
header('location: ../php/planner.php')
 ?>
