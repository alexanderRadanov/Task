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
 $addinfoWorked = new User();
 if (isset($_POST['subWorkedRealInfo'])) {
	extract(array_map("htmlspecialchars", $_POST), EXTR_OVERWRITE, "form_");
		$addWorkedEstate = $addinfoWorked->AddInfoWorked($tractor, $estate, $date, $areaWorked);
	    if ($addWorkedEstate) {
	        
	       echo "Done. Information added successfully!";
	    } else {
	       echo 'Something went wrong';
	    }
	}
 ?>
<!DOCTYPE HTML >
<html>
<head>
<title>Add worked real estate data</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('select').change(function () {
    $('input[type=number]').attr('max', $('option:selected',this).data('max'));
});
});
</script>
</head>

<body>
 <header>
    <center>Add worked real estate data!</center>
  </header>
<form action="" method="post" name="workedRE">
<table>
<tr>
<th>Name:</th>
<td><select name="tractor"><?php $user->get_data_tractor();?></select></td>
</tr>
<tr>
<th>Estate:</th>
<td><select class="select" name="estate" id="s"><?php $user->get_data_estate();?></select></td>
</tr>

<tr>
<th>Enter date:</th>
<td><input type="date" name="date" /></td>
</tr>
<tr>
<th>Enter area:</th>
<td><input type="number" name="areaWorked" min="1"  max=""/></td>
</tr>
<tr>
<td><input type="submit" name="subWorkedRealInfo" value="Go" /></td>
</tr>
</table>
</form>
</body>
</html>
