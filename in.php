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
	<input name = 'pass' type='password'>
	<input type='submit' value='login'>
	<input type='submit' value='signin'>
</form>

<?php 
$user = null;
if(!empty($_REQUEST['login']) && !empty($_REQUEST['pass'])) {
	$sql_params = array("{$_REQUEST['login']}","{$_REQUEST['pass']}");
	
	$dbconn = pg_connect("dbname=exempters user=postgres password=postgres");
	$query = '
	select 	login
	from userstest 
	where login = $1 
	and password = $2 
	limit 1';
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
<br><a href= "reg.php">Sign in</a>
</body>
</html>