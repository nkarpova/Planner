
<?php session_start();
/*if($_SESSION['user']){
  header('location: planner.php');*/
 ?>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
	<link href="../css/style.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <main>
    <header>
      <h1>Login</h1>
      <h1>to access</h1>
      <div class="menu">
            <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="registration.php">Registration</a></li>
            </ul>
          </div>
    </header>
    <container>
      <div>
        <img class="planning-img" src="../img/login.svg" alt="login img">
      </div>
      <?php
      if (isset($_SESSION['message'])){
      echo  '<p class="msg"> ' . $_SESSION["message"] . '</p>';
      }
      unset($_SESSION["message"]);
      ?>
  <form action="../controller/login.php" method="post">

  <label for="email">E-mail:</label><br>
  <input class="form-row" type="email" id="email" name="email" placeholder="  Text email here" ><br>
  <label for="fname">Password:</label><br>
  <input class="form-row" type="password" id="password" name="password" placeholder="  Text your password"><br><br>
  <button type="submit" class="button button-success">Sent</button>
</form>

    </container>
    <footer>
      <p>Powered by Natalia Karpova</p>
    </footer>
  </main>
