<?php
session_start();
	include_once 'class_user.php';
	$user = new User();

	if (isset($_POST['submit'])) {
	extract(array_map("htmlspecialchars", $_POST), EXTR_OVERWRITE, "form_");
		$login = $user->login($username, $password);
	    if ($login) {
	        
	       header("location: home.php");
	    } else {
	       echo 'Wrong username or password';
	    }
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head> 

<body>
<h1>Welcome user, please login:</h1>
<form action="" method="post" name="login">
<table>
<tr>
<th>Username</th>
<td><input type="text" name="username" required /></td>
</tr>
<tr>
<th>Password:</th>
<td><input type="password" name="password" required /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" value="Login" /></td>
</tr>
</table>
</form>

</body>
</html>


