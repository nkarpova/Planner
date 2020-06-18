<?php

require_once 'config_db.php';

$email = trim($_POST["email"]);
$password = trim($_POST["password"]);


   if(empty($_POST['email']))
	 $_SESSION["message"]= "Write your email please";

	if(empty($_POST['password']))
	 $_SESSION["message"]= "Write your email please";



   /*Создаем запрос на выборку из базы
   	        данных для проверки подлиности пользователя*/
            $logQuery= $connect->prepare("SELECT * FROM users
                WHERE email =:email
                AND password =:password");

             $logQuery->execute([
                  "email"=>$email,
                  "password"=>$password
                ]);

      if ($logQuery->rowCount() > 0) {
      $user = $logQuery->fetch(PDO::FETCH_ASSOC);
      session_start();
      $_SESSION["user_id"] = $user["id"];
      header('location:../php/planner.php');
      }

      else {
      $_SESSION["message"]="Invalid password or email";
        header('location:../php/login.php');
        }


/* $logQuery= $connect->prepare("SELECT * FROM users
    WHERE email =:email
    AND password =:password");

 $logQuery->execute([

      "email"=>$email,
      "password"=>$password
    ]);

if(mysqli_num_rows($logQuery) > 0){
  $user = mysqli_fetch_assoc($logQuery);
  $_SESSION['user']=[
    "id" => $user['id'],
    "username" => $user['username'],
    "email" => $user['email']
  ];
  header('location:../php/planner.php');
}
else{
  $_SESSION['message']="Invalid username o password";
  exit();
  setcookie('user', $user['email'], time()+3600, "/");
}*/


 ?>
