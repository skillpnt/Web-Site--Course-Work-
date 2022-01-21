<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
	session_start();
	?>
  <title>Новости</title>
  <?php include("includes/header.php"); ?>
  <?php 
	include("includes/news_bd.php"); 
	$news=getNews(4);
	// echo (count($news));
	// echo("getnews Rabotaet!");
  ?>
  <div class="topnav">
		<nav>
			
			<img class="icon" src="image/icon2.png" alt="Icon">
			<a href="index.php">
			Главная
			</a>
			<a class="active" href="news.php">
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
			if (($_SESSION['session_username'])=='admin'):
			?>
			<a href="add_news.php">
			Добавить новость
			</a>
			<?php endif; ?>
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

</head>

<body>
	<div class="news_col">
		<?php
			for( $i = 0; $i < count($news); $i++ )
		{
			echo "<div class=\"article\">
					<h1 class=\"news_title\">".$news[$i]["title"]."</h1>".
					"<div class=\"news_text\">".$news[$i]["full_text"]."</div>
					<div class=\"news_date\">".$news[$i]["date"]."&nbsp&nbsp&nbsp&nbsp&nbsp".$news[$i]["time"]."</div>
				</div>";
		
		}
		// echo("VIVOD");
		?>
	</div>
<footer>
© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
</footer>
</body>
</html>