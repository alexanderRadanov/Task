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
 $addTractorInfo = new User();
 if (isset($_POST['subTInfo'])) {
	extract(array_map("htmlspecialchars", $_POST), EXTR_OVERWRITE, "form_");
		$addT = $addTractorInfo->AddInfoTractor($tractorName);
	    if ($addT) {
	        
	       echo "Done. Information added successfully!";
	    } else {
	       echo 'Something went wrong';
	    }
	}
 ?>
<!DOCTYPE HTML >
<html>
<head>
<title>Add tractor</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
 <header>
    <center>Add tractor information!</center>
  </header>
<form action="" method="post" name="addT">
<table>
<tr>
<th>Name:</th>
<td><input type="text" name="tractorName" required /></td>
</tr>
<td><input type="submit" name="subTInfo" value="Go" /></td>
</tr>
</table>
</form>
</body>
</html>
