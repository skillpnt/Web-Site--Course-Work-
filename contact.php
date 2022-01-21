<!DOCTYPE html>
<html lang="ru">

<head>
	<?php
	session_start();
	?>
  <meta charset="utf-8">
  <title>Контакты</title>
  <?php include("includes/header.php"); ?>
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
			<a class="active" href="contact.php">
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
	<div class="map">
		<h1 align="center">Наш адрес</h1>
		<br>
		<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Af36834a090cc1f0a94499628121add218cb66bc8b473f0c975d89b390873910c&amp;width=1064&amp;height=436&amp;lang=ru_RU&amp;scroll=true"></script>
		<p align="center">ул. Немировича-Данченко, 136, Новосибирск.</p>
		<br>
		<h2 align="center">Связь по телефону</h2>
		<p align="center">+7-999-123-45-67</p>
		<p align="center">+7-999-765-43-21</p>
		<br>
		<h2 align="center">Связь по электронной почте</h2>
		<p align="center">nash_email@pochta.info</p>
		<footer>
		© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
		</footer>
	</div>

</body>

</html>