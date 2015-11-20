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
<title>Report</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head> 

<body>
<center><h1>Worked estate report:</h1></center>
<table style="margin-left:2.5%;margin-top:-10px;width:95%; border: 1px solid black; border-collapse: collapse;" border="1">
<tr>
<td>Estate name:</td>
<td>Culture</td>
<td>Date</td>
<td>Tractor</td>
<td>Area Worked</td>
</tr>
<?php $user->get_estate_worked();?>
<tr>
<td>All area worked</td><td><td><td></td></td></td><?php $user->get_all_worked();?>
</tr>
</table>
<br><br>

<form action="" method="post" name="fil">
Search (by Estate name, Tractor, Culture or Date:<input type="text" name="filtered"><input type="submit" value="Filter" name="filter"></form><br>
<table style="margin-left:2.5%;margin-top:-10px;width:95%; border: 1px solid black; border-collapse: collapse;" border="1">
<tr>
<td>Estate</td><td>Culture</td><td>Date</td><td>Tractor</td><td>Area</td>

</tr>
<tr>
<?php
if (isset($_POST['filter'])) {
	extract(array_map("htmlspecialchars", $_POST), EXTR_OVERWRITE, "form_");
		 $fil=$user->filter($filtered);  
	   }
	?>
</tr>
</table>

</body>
</html>


