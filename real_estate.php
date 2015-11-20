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
 $addinfo = new User();
 if (isset($_POST['subRealInfo'])) {
	extract(array_map("htmlspecialchars", $_POST), EXTR_OVERWRITE, "form_");
		$add = $addinfo->AddInfo($name, $culture, $area);
	    if ($add) {
	        
	       echo "Done. Information added successfully!";
	    } else {
	       echo 'Something went wrong';
	    }
	}
 ?>
<!DOCTYPE HTML >
<html>
<head>
<title>Add info - real estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
 <header>
    <center>Add real estate information!</center>
  </header>
<form action="" method="post" name="add">
<table>
<tr>
<th>Name:</th>
<td><input type="text" name="name" required /></td>
</tr>
<tr>
<th>Culture:</th>
<td><input type="text" name="culture" required /></td>
</tr>
<tr>
<th>Culture:</th>
<td><input type="number" name="area" required /></td>
<td><input type="submit" name="subRealInfo" value="Go" /></td>
</tr>
</table>
</form>
</body>
</html>
