<!DOCTYPE html>
<html lang="ru">
<head>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/style2.css" media="screen" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
<?php
session_start();
if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	<div class="topnav">
		<nav>
			
			<img class="icon" src="image/icon2.png" alt="Icon">
			<a class="active" href="index.php">
			Главная
			</a>
			<a href="news.php">
			Новости
			</a>
			<a href="contact.php">
			Контакты
			</a>
			<a href="about.php">
			О нас
			</a>
			<a class="welcome_sign" style="padding-left: 50px;">
			<?php
				echo $_SESSION["session_username"];
			?>
			</a>
			<?php
			if (empty($_SESSION['session_username'])):
			?>
			<a class="login_nav" href="login.php">
			Войти
			</a>
			<?php endif; ?>
			<?php
			if (!empty($_SESSION['session_username'])):
			?>
			<a class="login_nav" href="logout.php">
			Выйти
			</a>
			<?php endif; ?>
		</nav>
	</div>
<div id="welcome">
<h2>Добро пожаловать, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Выйти</a> из системы</p>
  <p><a href="index.php">На главную</a></p>
</div>
	
<?php endif; ?>
</head>

<body>
	
</body>
</html>