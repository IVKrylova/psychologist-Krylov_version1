<?php include 'header.php'; ?>

<div class="wrapper-content" id="rew">

	<h2>отзывы</h2>
	<!-- Другие отзывы -->
	<div class="reviews-other reviews-other-grid-2">
		<img src="img/review1.PNG" alt="Отзыв с сайта b17">
		<img src="img/review2.PNG" alt="Отзыв с сайта b17">
	</div>

	<!-- Отзывы с сайта -->
	<div class="reviews-site">
		<?php
			include_once 'bd.php';
			$res2 = mysqli_query($mysqli, "SELECT * FROM `reviews` WHERE `review_id` >= 0");
			while($row2 = mysqli_fetch_assoc($res2))
			echo "<div class=\"review-site\">
					<p class=\"review-site-name review-site-problem\"><span>{$row2['name']}</span>, {$row2['problem']}</p>
					<p class=\"review-site-review\">{$row2['review']}</p>
					<p class=\"review-site-date\">{$row2['date']}</p>
				</div>";
		?>
	</div>
	
	<!-- Форма отзыва -->
	<div class="form-reviews">
		<p class="form-reviews-header">Здесь Вы можете оставить свой отзыв</p>
		<form name="form" method="post">
			<p>
				<label class="zindex">Введите Ваше имя:<br></label>
				<input class="pole pole5" type="text" name="name" value="" required placeholder="Ваше имя"> 
			</p>
			<p>
				<label class="zindex">В чем заключалась Ваша проблема?<br></label>
				<input class="pole pole6" type="text" name="problem" value="" required placeholder="Дайте краткое название Вашей проблеме">
			</p>
			<p>
				<label class="zindex">Выскажите Ваше мнение:<br></label>
				<textarea class="pole-text" type="text" name="review" value="" required placeholder="Введите сообщение"></textarea> 
			</p>
			<input class="submit button-form" type="submit" name="submit" value="Отправить">
		</form>
		<?php 

			include_once 'bd.php';

			if(isset($_POST['submit'])) {
				if (empty($_POST['name'])) {
					echo "Введите Ваше имя";
				}
				elseif (empty($_POST['problem'])){
					echo "Введите проблему";
				}
				elseif (empty($_POST['review'])){
					echo "Напишите Ваш отзыв";
				}
				else {
					$name = $_POST['name'];
					$problem = $_POST['problem'];
					$review = $_POST['review'];
					$date = date("d.m.Y");
					$res1 = mysqli_query($mysqli, "INSERT INTO `reviews`(`name`, `problem`, `review`, `date`) VALUES ('$name', '$problem', '$review', '$date')");

					$address = "basni_krylova@bk.ru";
					$mes = "Добавлен новый отзыв";
					mail($address, "Отзыв!", $mes);
				}
			}
		?>
	</div>

	
	
	
	
</div>

<?php include 'footer.php'; ?>