<!DOCTYPE html>
<html lang="ru">
<head>
	<?php
	session_start();
	?>
	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>
  <title>Новости</title>

<?php
	if(isset($_POST["add_news"])){
		if(!empty($_POST['title']) && !empty($_POST['full_text'])) {
			$title= htmlspecialchars($_POST['title']);
			$full_text=htmlspecialchars($_POST['full_text']);
			$date=date("Y-m-d");
			$time=date("H:i:s");  
			$sql="INSERT INTO news (title, full_text, date, time) VALUES ('".$title."','".$full_text."', '".$date."', '".$time."')";
			$result=mysql_query($sql);
			if($result){
				$message = "Article added!";
			}
			else {
				$message = "Failed to insert data information! SQL query:".$sql;
			}
		}
	}
?>

	<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>

	<style>
		#login {
			width: 630px;
			margin: auto;
			padding-bottom: 15px;
		}
* 
		.container form .input{
			background: #fbfbfb;
			font-size: 24px;
			line-height: 1;
			width: 100%;
			padding: 3px;
			margin: 0 6px 5px 0;
			outline: none;
			border: 1px solid #d9d9d9;
		}
	</style>

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
			if (($_SESSION['session_username'])=='admin'):
			?>
			<a class="active" href="add_news.php">
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
<div class="container mnews">
		<div id="login">
			<h1>Добавление статьи</h1>
			<form action="" id="news_form" method="post" name="news_form">
			<p>
				<label for="title">Заголовок<br>
				<input class="input" id="title" name="title" type="text" value=""></label>
			</p>
			<p>
				<label for="news_content">Описание статьи<br>
				<textarea class="input" id="full_text" name="full_text" type="text" value=""></textarea></label>
			</p> 
			<p class="submit">
				<input class="button" id="add_news" name="add_news" type= "submit" value="Создать статью">
			</p>
			</form>
		</div>
</div>
<footer>
© 2021 <a href="http://kursovaya_icann.ru/index.php">Корпорация по управлению доменными именами и IP-адресами</a>. Все права защищены.
</footer>
</body>
</html>