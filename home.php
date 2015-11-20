<?php
session_start();
include_once 'class_user.php';
$user = new User(); 
$id = $_SESSION['id'];
if (!$user->get_session()){
 header("location:login.php");
}

if (isset($_GET['q'])){
 $user->user_logout();
 header("location:login.php");
 }
 ?>


<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta charset="windows-1251">
</head>

<body>
 <header>
    <center><h1>Welcome!</h1></center>
  </header>
  

  <section>
  
  <header>
  Agro task:<br>
  <a href="home.php">Home</a>|<a href="real_estate.php">Add estate</a>|<a href="tractor.php">Add tractor</a>|
  <a href="real_estate_data.php">Add worked estate</a>|<a href="report.php">Report</a>|<a href="home.php?q=logout">Logout</a>

    </header>
	
  </section>
  
<footer>
<center>&copy;Copyright</center>
  </footer>
</body>
</html>
