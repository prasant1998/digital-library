<?php
	session_start();
	if(!isset($_SESSION["check"])) {
		session_destroy();
		header("location: http://localhost/MyFiles/main_page.php");
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$dbhost = 'localhost';
		$dbuser = 'root';
		$pass = '8241';
		$dbname = 'admin';
		$conn = mysqli_connect($dbhost, $dbuser, $pass, $dbname);
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$type = test_input($_POST['type']);
		$id = test_input($_POST['id']);
		if ($type=='books') {
			$sql= "select count(mem_id) as cou from book_members where book_id='$id'";
			$row= mysqli_query($conn, $sql);
			$c= mysqli_fetch_object($row);
			if ($c->cou > 0) {
				mysqli_close($conn);
				return false;
			}
		}
		$sql = "delete from $type where id = '$id'";
		mysqli_query($conn, $sql);
		if ($type=='members') {
			session_destroy();
		}
		mysqli_close($conn);
		echo true;
	}
?>