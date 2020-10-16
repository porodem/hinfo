<!DOCTYPE html>
<html>
<head>
<title>HINFO</title>
<meta charset='utf-8'>
</head>
<body>
<form action='/hinfo/in.php' method='POST'>
	login<br>
	<input name = 'login'><br>
	password<br>
	<input name = 'pass' type='password'><br>
	confirm password<br>
	<input name = 'passs' type='password'>
	<input type='submit' value='sign in'>
</form>

<?php 

?>
<br>Already have account? Then <a href= "in.php">login</a>
</body>
</html>