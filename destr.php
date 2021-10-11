<?php
	if (isset($_SESSION['avt'])) {
		session_start();
		session_destroy();
	}
?>