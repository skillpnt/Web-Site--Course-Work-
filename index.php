<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
	session_start();
	?>
	<title>Главная</title>
	<?php include("includes/header.php"); ?>
</head>

<body>
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
	<div class="content">
	<div class="banner">
		<img class="banner_img" src="image/banner.png">
		<div class="banner_text">
			<span style="font-size: 30px; font-weight: bold">
			Добро пожаловать на наш сайт!
			</span> <br>
			Корпорация по управлению доменными именами и IP-адресами.
		</div>
	</div>
	
	<div class="short_about">
		<div class="short_about1">
			<span style="font-size: 30px; font-weight: bold">Чем занимается наша компания?</span>
			<br>
			Для связи с другим пользователем по Интернету необходимо ввести соответствующий адрес в компьютере: имя или номер. 
			Данный адрес должен быть уникальным, чтобы компьютеры могли найти друг друга. 
			ICANN осуществляет координацию этих уникальных идентификаторов по всему миру. 
			Без этого не существовало бы глобального Интернета.
			<br>
			<br>
			<br>
			<span style="font-size: 30px; font-weight: bold">Что такое система доменных имен?</span>
			<br>
			Система доменных имен (DNS) создана для того, чтобы сделать Интернет доступным для людей. 
			Главный способ, которым компьютеры, составляющие Интернет, 
			находят друг друга - это серии номеров, где каждый номер (так называемый IP-адрес) относится к отдельному компьютеру. 
			Однако людям было бы сложно запоминать длинные списки номеров, 
			поэтому в DNS чаще используются буквы, а не цифры, 
			и определенные наборы букв связываются с определенными наборами цифр.
		</div>
		<div class="short_about2">
			<img class="short_about_img" src="image/network.png" width="900px">
		</div>
	</div>
	</div>
<footer>
© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
</footer>
</body>

</html>