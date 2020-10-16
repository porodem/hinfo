<?php include("includes/headers.php");?>
<div class="container mlogin">
<div id="login">
<h1>Login</h1>
<form action='/hinfo/in.php' id="loginform" name="loginform" method='POST'>
	<p><label for="user_login">user name<br>
	<input class="input" name = 'login' type="text"></label></p>
	<p><label for="user_pass">password<br>
	<input name = 'pass' type='password'></label></p>
	<p class="submit"><input class="button" type='submit' value='Log in'></p>
	<p class="regtext">Not registered yet? <a href= "reg.php">registration</a>!</p>
</form>
</div>
</div>

<?php 
require("constants.php"); //no use yet

$user = null;
if(!empty($_REQUEST['login']) && !empty($_REQUEST['pass'])) {
	
	$sql_params = array("{$_REQUEST['login']}","{$_REQUEST['pass']}");	
	$dbconn = pg_connect("dbname=exempters user=postgres password=postgres");
	$query = 'select login from userstest where login = $1 and password = $2 limit 1';
	
	$result = pg_query_params($dbconn, $query, $sql_params);
	//echo print_r($result);
	//check if result contain something
	if(pg_num_rows($result) > 0) {
		//if result not empty take it's first row(0) and save as array
		$login_str = pg_fetch_row($result, 0);
		//option for save result row as object
		$user = pg_fetch_object($result);
		echo 'has login - ' . $login_str[0] . '; user_object login field: ' . $user -> login;
	} else { echo 'not found'; }
} else {
	echo '<br>Please, fill both <b>login</b> and <b>password</b>, fields';
}
// add session
	if(!empty($user)) {
		//succesfull autorization
		session_start();
		$_SESSION['auth'] = true;
		//$_SESSION['id'] = $user['id'];
		$_SESSION['login'] = $user->login;
	} else {
		//action when wrong authentification
	}

?>
<?php include("includes/footers.php");?>