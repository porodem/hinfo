<?php 
session_start();
include("includes/headers.php");
?>

<div id="welcome">
<h2>Привет, <span> <?= (isset($_SESSION['login'])?$_SESSION['login']:'гость') ?> </span>!</h2>
<p><a href='intro.php?notes=1'>БД Регистр - часто используемые поля</a>
<p><a href='intro.php?notes=2'>web приложение Льготники</a>
<p><a href='intro.php?notes=3'>Реестры</a>
<p><a href='intro.php?notes=4'>Jasper Регистр</a>
<p><a href='intro.php?notes=5'>Оформление заявки на выгрузку SQL</a>
<br><br>
<p style="text-align:right"><a href="logout.php"><?= (isset($_SESSION['login'])?'выйти </a>с сайта</p>':'регистрация </a>на сайте</p>') ?>
</div>
<?php
//
function showContent($path, $lvl_required=2) {
	$message = 'недостаточный уровень доступа';
	if(isset($_SESSION['access_lvl'])) {
	$access = $_SESSION['access_lvl'];
	} else { $access = 1; }
	if($access >= $lvl_required) {
	echo '<div style="width: 800px; margin: 20px auto ">' . file_get_contents($path) . '</div>';	
	} else {
		echo "<p class=\"error\">недостаточный уровень доступа</p>";
	}
}
	

function readTextFile($id) {
	switch($id) {
		case 1:
		showContent("pages/RegisterDBpopularfields.html",3);
		break;
		case 2:
		echo showContent("pages/Exemptersproject.html");
		break;
		case 3:
		echo showContent("pages/reestrs.html");
		break;
		case 4:
		echo showContent("pages/Jasper.html");
		break;
		case 5:
		echo showContent("pages/SQL_issue.html", 1);
		break;
		default:
		echo '<div style="width: 180px; margin: 20px auto ">такой страницы нет</div>';;
	}
}
//if user is not authorisated kick him to login page
/*if(!$_SESSION['auth']) {
	header("location: in.php");
}*/
//if any of notes is picked - show it
if(isset($_GET['notes']) /*and $_SESSION['auth']*/) {
	readTextFile($_GET['notes']);
}

?>
<?php include("includes/footers.php");?>