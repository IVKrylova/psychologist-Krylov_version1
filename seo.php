<?php 
	include_once 'bd.php';
	$res7 = mysqli_query($mysqli, "SELECT * FROM `seo` WHERE id_seo>0");
	while($row7 = mysqli_fetch_assoc($res7)) {
		print_r($row7);
echo "string";
	}

		if ($_SERVER['REQUEST_URI'] == "/index.php") {
			echo "<title>{$title[0]}</title>
				<meta name=\"description\" content=\"{$descript[0]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/working-with-problems.php") {
			echo "<title>{$title[1]}</title>
				<meta name=\"description\" content=\"{$descript[1]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/format-of-work.php") {
			echo "<title>{$title[2]}</title>
				<meta name=\"description\" content=\"{$descript[2]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/project.php") {
			echo "<title>{$title[3]}</title>
				<meta name=\"description\" content=\"{$descript[3]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/timetale.php") {
			echo "<title>{$title[4]}</title>
				<meta name=\"description\" content=\"{$descript[4]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/reviews.php") {
			echo "<title>{$title[5]}</title>
				<meta name=\"description\" content=\"{$descript[5]}\">";
		} elseif ($_SERVER['REQUEST_URI'] == "/contacts.php") {
			echo "<title>{$title[6]}</title>
				<meta name=\"description\" content=\"{$descript[6]}\">";
		}
	
?>