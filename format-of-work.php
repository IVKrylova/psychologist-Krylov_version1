<?php include 'header.php'; ?>

<div class="wrapper-content" id="format">
	<!-- Типы работы -->
	<h2>Формат работы</h2>
	<div class="form-work format-grid-3">
		<?php 
			include_once 'bd.php';
			$res = mysqli_query($mysqli, "SELECT * FROM `format` WHERE format_id>0");
			while($row = mysqli_fetch_assoc($res))
				echo "<div class=\"format animated boxHidded\">
						<img src=\"{$row['img']}\" alt=\"Формат работы\">
						<h3>{$row['format_name']}</h3>
						<p class = \"descr\">{$row['description']}</p>
					</div>";
		?>
	</div>

	<!-- Принципы работы -->
	<div class="wrap-principles">
		<h3>Принципы работы</h3>
		<div class="principle-grid-3 animated boxHidded">
			<div class="principle">
				<span class="head">Принцип подлинности и<br>собственности проблем</span>
				<p>Работа с причинами, а не последствиями. Поиск и точное установление главной проблемной области, стоящей за постоянно возникающими трудностями, неэффективными действиями и ошибками в мышлении</p>
			</div>
			<div class="principle">
				<span class="head">Принцип направленности на Человека<br>во всей его индивидуальной целостности</span>
				<p>Направленность на Человека, а не на теоретические представления о том, каким он должен быть. Наличие знаний и умения пользоваться методами и техниками просто необходимо, но это они должны встраиваться в случай конкретного человека, а не человек должен усредняться и подгоняться под теорию и техники</p>
			</div>
			<div class="principle">
				<span class="head">Принцип конфиденциальности</span>
				<p>Гарантия неразглашения информации, полученной во время консультирования или анализа</p>
			</div>
		</div>
	</div>
	
	<!-- Цены --> 
	<div class="price">
		<p class="circle circle-anime animated boxHidded">Очная сессия – 1500 руб.</p>
		<p class="circle circle-anime animated boxHidded">Skype-сессия (видео обязательно) – 1200 руб.</p>
		<p class="circle circle-anime animated boxHidded">Сессия в рамках проекта – 1000 руб.</p>
		<p>Указанные цены не являются фиксированными, в индивидуальном порядке возможно обсуждение и установление приемлемой стоимости</p>
		<p>Студентам предоставляется скидка 30%</p>
	</div>
	
</div>

<?php include 'footer.php'; ?>

