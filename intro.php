<?php 
session_start();
include("includes/headers.php");
?>

<div id="welcome">
<h2>Welcome, <span> <?= $_SESSION['login'] ?> </span>!</h2>
<p><a href='intro.php?notes=1'>БД Регистр - часто используемые поля</a>
<p><a href="logout.php">logout</a> from site</p>
</div>
<?php
function readTextFile($id) {
	switch($id) {
		case 1:
		echo '<div style="width: 800px; margin: 20px auto ">' . file_get_contents("pages/RegisterDBpopularfields.html") . '</div>';
		break;
		default:
		echo 'nothing';
	}
}
if(isset($_GET['notes']) and $_SESSION['auth']) {
if($_GET['notes'] == 1) {
	readTextFile(1);
} else {
	echo 'shit!';
}
} else {
	header("location: in.php"); //TO DO mayb locate to new page with message of limited access, and link to registration
}

?>
<?php include("includes/footers.php");?>