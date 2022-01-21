<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
		session_start();
		if(isset($_SESSION["session_username"])){
		header("location:intropage.php");
		}
	?>
  <meta charset="utf-8">
  <title>Войти</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="css/style2.css" media="screen" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>	 
	<?php
		if(isset($_POST['login'])){
			if(empty($_POST['username']) or empty($_POST['password'])) {
			echo "All fields are required!";
			}
			else {
			$username=htmlspecialchars($_POST['username']);
			$password=htmlspecialchars($_POST['password']);
			$query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
			$numrows=mysql_num_rows($query);
			if($numrows!=0)
				{
					$_SESSION['session_username']=$username;
					/* Перенаправление браузера */
					if(isset($_SESSION['session_username'])){
					echo '<meta http-equiv="refresh" content="0;URL=/intropage.php">';

					}
					else {
					echo "Invalid username or password!";
					}
				}
			}
		}
	?>
</head>

<body>
	<div class="topnav">
		<nav>
			
			<img class="icon" src="image/icon2.png" alt="Icon">
			<a href="index.php">
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
			if (!empty($_SESSION['session_username'])) {
				echo "Добро пожаловать, ".$_SESSION["session_username"]."!";
			}
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
	
	<div class="container mlogin">
		<div id="login">
			<h1>Вход</h1>
			<form action="" id="loginform" method="post" name="loginform">
			<p><label for="user_login">Имя пользователя<br>
			<input class="input" id="username" name="username" size="20"
			type="text" value=""></label></p>
			<p><label for="user_pass">Пароль<br>
			<input class="input" id="password" name="password" size="20"
			type="password" value=""></label></p> 
				<p class="submit"><input class="button" name="login"type= "submit" value="Войти"></p>
				<p class="regtext">Если вы не зарегистрированы:<a href= "register.php"> Регистрация</a></p>
			</form>
		</div>
	</div>
	<footer>
		© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
	</footer>
</body>

</html>