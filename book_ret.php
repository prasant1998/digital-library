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
		$mem_id = test_input($_POST["mem_id"]);
		$book_id = test_input($_POST["book_id"]);
		$sql = "delete from book_members where book_id='$book_id' and mem_id='$mem_id'";
		mysqli_query($conn,$sql);
		mysqli_close($conn);
		echo true;
	}
?>
		