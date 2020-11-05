<?php 
session_start();
include("includes/headers.php");
?>

<div id="welcome">
<h2>Welcome, <span> <?= $_SESSION['login'] ?> </span>!</h2>
<p><a href='intro.php?notes=1'>БД Регистр - часто используемые поля</a>
<p><a href='intro.php?notes=2'>web приложение Льготники</a>
<br><br>
<p style="text-align:right"><a href="logout.php">logout</a> from site</p>
</div>
<?php
function readTextFile($id) {
	switch($id) {
		case 1:
		echo '<div style="width: 800px; margin: 20px auto ">' . file_get_contents("pages/RegisterDBpopularfields.html") . '</div>';
		break;
		case 2:
		echo '<div style="width: 800px; margin: 20px auto ">' . file_get_contents("pages/Exemptersproject.html") . '</div>';
		break;
		default:
		echo '<div style="width: 180px; margin: 20px auto ">такой страницы нет</div>';;
	}
}
//if user is not authorisated kick him to login page
if(!$_SESSION['auth']) {
	header("location: in.php");
}
//if any of notes is picked - show it
if(isset($_GET['notes']) /*and $_SESSION['auth']*/) {
	readTextFile($_GET['notes']);
}

?>
<?php include("includes/footers.php");?>