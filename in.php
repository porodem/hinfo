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
	<input type='submit' value='send'>
</form>
<?php 

if(!empty($_REQUEST['login']) && !empty($_REQUEST['pass'])) {
	$sql_params = array("{$_REQUEST['login']}","{$_REQUEST['pass']}");
	
	$dbconn = pg_connect("dbname=exempters user=postgres password=postgres");
	$query = 'select login from userstest where login = $1 and password = $2 limit 1';
	$result = pg_query_params($dbconn, $query, $sql_params);
	//echo print_r($result);
	if(pg_num_rows($result) > 0) {
		$login_str = pg_fetch_row($result, 0);
		echo 'has login - ' . $login_str[0];
	} else { echo 'not found'; }
} else {
	echo '<br>Please, fill both <b>login</b> and <b>password</b>, fields';
}
?>
</body>
</html>