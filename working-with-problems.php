<?php include 'header.php'; ?>

<div class="wrapper-content" id="working">
	<!-- Вступительный текст -->
	<div class="open-text">
		<h2>работа с проблемами</h2>
		<p>При встрече с проблемой мы испытываем дискомфорт или даже страдание. Проблема возникает тогда, когда наши представления или желания не совпадают с реальностью мира. В большинстве случаев из проблемы сложно найти выход с помощью собственного мышления, так как именно наша привычная стратегия мышления и привычное восприятие мира и являются причиной образования проблемы.</p>
		<p>Наше мышление в любой момент может не справиться со сложностью происходящих в жизни событий, и соответственно, проблема может проявиться в самых разных формах:</p>
	</div>

	<!-- Проблемы -->
	<div class="problems problems-grid-3" id="id-problems">
		<?php 
			include_once 'bd.php';
			$res = mysqli_query($mysqli, "SELECT * FROM `categories` WHERE category_id>0");
			while($row = mysqli_fetch_assoc($res))
				echo "<div class=\"problem animated boxHidded\">
						<img src=\"{$row['img']}\" alt=\"Проблема\">
						<h3>{$row['category_name']}</h3>
						<p class = \"descr\">{$row['description']}</p>
					</div>";
		?>
	</div>
	
	
</div>

<?php include 'footer.php'; ?>