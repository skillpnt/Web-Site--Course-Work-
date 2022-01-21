<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once("includes/connection.php"); ?>
	<meta charset="utf-8"> 
	<link href="css/style2.css" media="screen" rel="stylesheet">
	<?php include("includes/header.php"); ?>
	<?php
	if(isset($_POST["register"])){
		if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name= htmlspecialchars($_POST['full_name']);
		$email=htmlspecialchars($_POST['email']);
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'") or die(mysql_error());;
		$numrows=mysql_num_rows($query);
		if($numrows==0)
		{
			$sql="INSERT INTO usertbl
			(full_name, email, username,password)
			VALUES('".$full_name."','".$email."', '".$username."', '".$password."')";
			$result=mysql_query($sql);
			if($result){
			$message = "Account Successfully Created";
			}
			else {
			$message = "Failed to insert data information! SQL query:".$sql;

			}
		}
		else {
		$message = "That username already exists! Please try another one!";
		}
		}
	else {
	$message = "All fields are required!";
	}
	}
	?>

	<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>

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
<div class="container mregister">
	<div id="login">
		 <h1>Регистрация</h1>
		<form action="register.php" id="registerform" method="post"name="registerform">
		 <p><label for="user_login">Полное имя<br>
		 <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
		<p><label for="user_pass">E-mail<br>
		<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
		<p><label for="user_pass">Имя пользователя<br>
		<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
		<p><label for="user_pass">Пароль<br>
		<input class="input" id="password" name="password"size="32"   type="password" value=""></label></p>
		<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
			  <p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
		 </form>
	</div>
</div>
<footer>
© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
</footer>
</body>
</html>