<?php include("includes/headers.php");?>
<div class="container mregister">
<div id="login">
<h1>Registration</h1>
<form action='/hinfo/reg.php' id="registerform" name="registerform" method='POST'>
	<p><label for="user_login">login<br>
	<input class="input" id="username" name = 'login'></label></p>
	<p><label for="user_email">email<br>
	<input class="input" id="email" name = 'email'></label></p>
	<p><label for="user_pass">password<br>
	<input class="input" id="pass" name = 'pass' type='password'></label></p>
	<p class="submit"><input class="button" id="register" name="register" type="submit" value="sign in"></p>
		<p class="regtext">Already registered? <a href="login.php">Input user name</a>!</p>
</form>
</div>
</div>

<?php 
//require("constants.php"); //no use yet

$user = null;
if(!empty($_REQUEST['login']) && !empty($_REQUEST['pass']) && !empty($_REQUEST['email'])) {
	
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$message = 'invalid email!';
	} else {
	$sql_params = array("{$_REQUEST['login']}","{$_REQUEST['pass']}");	
	$dbconn = pg_connect("dbname=exempters user=postgres password=postgres");
	$query = 'select login from userstest where login = $1 and password = $2 limit 1';
	$query_insert = 'INSERT INTO userstest(login, password) VALUES ($1, $2)';
	
	$result = pg_query_params($dbconn, $query, $sql_params);
	//echo print_r($result);
	//check if result contain something
	if(pg_num_rows($result) == 0) {
		//
		$result = pg_query_params($dbconn, $query_insert, $sql_params);
		
		if($result) {
			$message = 'user succesfuly created';
		} else {
			$massage = 'error inserting new user in DB';
		}

	} else { $message = 'user already exists'; }
	}
} else {
	$message = 'All fields are required!';
}
// "<p class=\"error\">" . "MESSAGE: " . $message . "</p>"
?>
<br><a href= "in.php">Sign in</a>
<?php if(!empty($message)) { echo "<p class=\"error\">" . "MESSAGE: " . $message . "</p>";} ?>
<?php include("includes/footers.php");?>