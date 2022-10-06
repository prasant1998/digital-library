<?php
	session_start();
	session_destroy();
	header('location: http://localhost/MyFiles/main_page.php');
?>