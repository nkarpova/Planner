<?php
  /*setcookie('user',$user['email'], time() - 3600, "/");*/
  session_start();
  unset($_SESSION['user_id']);
  header('Location:../index.html')
 ?>
