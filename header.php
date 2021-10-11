<?php session_start(); ?>

<?php
	function data_filter($data)	{
		$data = htmlspecialchars($data);
		$data = mysql_escape_string($data);
		return $data;
	}
?>

<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php
			if ($_SERVER['REQUEST_URI'] == "/") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде</title>
					<meta name=\"description\" content=\"Консультация психолога в Нижнем Новгороде. Психологическая помощь в трудной ситуации.\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/index.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде</title>
					<meta name=\"description\" content=\"Консультация психолога в Нижнем Новгороде. Психологическая помощь в трудной ситуации.\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/working-with-problems.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Решение психологических проблем</title>
					<meta name=\"description\" content=\"Психологическое консультирование при различных проблемах: депрессия, страх, панические атаки, зависимости.\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/format-of-work.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Услуги</title>
					<meta name=\"description\" content=\"Формат работы психолога: skype, психологическое консультирование,  психоанализ. Цены на услуги психолога в Нижнем Новгороде.\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/project.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Проект</title>
					<meta name=\"description\" content=\"Консультация психолога в рамках проблемно-символического подхода.\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/timetale.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Запись на прием</title>
					<meta name=\"description\" content=\"Запись на прием психолога в Нижнем Новгороде\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/reviews.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Отзывы</title>
					<meta name=\"description\" content=\"Отзывы о работе практикующего психолога\">";
			} elseif ($_SERVER['REQUEST_URI'] == "/contacts.php") {
				echo "<title>Психолог Алексей Крылов в Нижнем Новгороде - Контакты</title>
					<meta name=\"description\" content=\"Психолог Алексей Крылов +7 (910) 103-15-99 basni_krylova@bk.ru\">";
			}
		?>

		<meta name="yandex-verification" content="0255136b20acb5aa" />

		<link rel="shortcut icon" href="img/psi.png">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="style/grid.css">
		<link rel="stylesheet" href="libs/owl-carousel/owl.carousel.css">
		<link rel="stylesheet" href="libs/owl-carousel/owl.theme.css">
		<link rel="stylesheet" href="libs/dist/css/lightbox.css">
		<link rel="stylesheet" href="style/normalize.css">
		<link rel="stylesheet" href="libs/animate/animate.min.css">
		<link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="style/media.css">

		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>

	<body class="hg">
		<header class="header">
			<div class="bg-photo">
				<div class="header-top header-grid-2">
					<h1>Психолог Алексей Крылов</h1>
					<p class="phone">8 (910) 103-15-99</p>
				</div>
			</div>
			<nav class="top-menu " id="top_nav">
				<ul class="menu-grid-7">
					<li class="top-menu-mobile-l">
						<a href="#"><img src="img/menu.png" alt="menu"></a>
						<!-- Вложенное меню -->
						<ul class="top-menu-mobile-m">
							<li><a href="index.php">Кто я?</a></li>
							<li><a href="working-with-problems.php">Работа с проблемами</a></li>
							<li><a href="format-of-work.php">Формат работы</a></li>
							<li><a href="timetale.php">Расписание</a></li>
							<li><a href="reviews.php">Отзывы</a></li>
							<li><a href="contacts.php">Контакты</a></li>
						</ul>
					</li>
					<li class="top-menu-mobile hreftop"><a href="index.php#main">Кто я?</a></li>
					<li class="top-menu-media top-menu-mobile">
						<a href="#">Сотрудничество</a>
						<!-- Вложенное меню -->
						<ul class="top-menu-tablet">
							<li><a href="working-with-problems.php#working">Работа с проблемами</a></li>
							<li><a href="format-of-work.php#format">Формат работы</a></li>
							<li><a href="reviews.php#rew">Отзывы</a></li>
						</ul>
					</li>
					<li class="top-menu-laptop top-menu-mobile hreftop"><a href="working-with-problems.php#working">Работа с проблемами</a></li>
					<li class="top-menu-laptop top-menu-mobile hreftop"><a href="format-of-work.php#format">Формат работы</a></li>
					<li class="top href-top"><a href="project.php#proj">ПРОЕКТ</a></li>
					<li class="top-menu-mobile hreftop"><a href="timetale.php#timet">Расписание</a></li>
					<li class="top-menu-laptop top-menu-mobile hreftop"><a href="reviews.php#rew">Отзывы</a></li>
					<li class="top-menu-mobile hreftop"><a href="contacts.php#contacts">Контакты</a></li>
				</ul>
			</nav>
		</header>