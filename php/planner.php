
<?php

/*if(!$_SESSION['user']){
  header('location:../index.php');
}*/
require_once '../controller/config_db.php';
$tasksQuery =$connect->prepare( "SELECT id, name, done FROM tasks
WHERE user =:user
ORDER BY id DESC ");

$tasksQuery->execute([
  "user"=> $_SESSION["user_id"]
]);
$tasks = $tasksQuery->rowCount() ? $tasksQuery : [];

 ?>

<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
	<link href="../css/planner.css" rel="stylesheet">


  <title>Planner</title>
</head>
<body>
  <main>
    <div class="header-planner">
      <br>
      <h2>A GOAL</h1>
      <h2 class="planner-txt">WITHOUT A PLAN</h2>
      <h2 class="planner-txt">IS JUST A WISH </h2>
      <br>
      <h6 class="planner-txt">Antoine de Saint-Exuperi</h6>
      <br>
          <a href="../controller/exit.php" style="text-decoration:none;color:#16b4a5;font-size: 15px;">Log out</a>
  <!--    <h2>Plan your day for success!</h2> -->
    </div>
  <!-- <h2><?php $_SESSION['username']?>, plan your day for success!</h2> -->

<div class="container">
  <h2 class="todo">To do list:</h2>
  <br>
  <form class="item-add" action="../controller/add.php" method="post" >
    <input type="text" name="name" class="input" placeholder="Type a new item here." >
    <br>
    <button type="submit" value="Add" class="button submit"><a> ADD+ </a> </button>
   </form>
   
    <div class="list">

      <?php if(!empty($tasks)): ?>
       <ul class="items">
         <?php foreach ($tasks as $task): ?>
          <li>

            <span class="item <?php echo $task["done"] ? " done": '' ?>" > <?php echo $task["name"] ?> </span>
            <?php if(!$task["done"]): ?>
            <a href="../controller/mark.php?as=done&task=<?php echo$task["id"]; ?>" class="done-button">	&#128504;</a>
          <?php endif; ?>
            <span >
            <a  class="done-button" href="../controller/delete.php?id=<?php echo $task["id"] ?>">&#128465;</a>
            </span>
           </li>
          <li> <span class="item-done" ></span>
          </li>
        <?php endforeach; ?>

       </ul>
     <?php else: ?>
       <p>You haven't added any items yet.</p>
     <?php endif; ?>

        </div>
      </div>
      <div class="planner-img">
          <img src="../img/user.svg" alt="img">
      </div>
    <footer>
      <p>Powered by Natalia Karpova</p>
    </footer>
  </main>
