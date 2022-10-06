<?php
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
		$user_id = test_input($_POST['id']);
		$passwd = test_input($_POST['pass']);
		$sql = "select * from members where id = '$user_id'";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			if ($row['passwd'] == $passwd) {
				session_start();
				$_SESSION["details"]=$row;
				$_SESSION["check"]=true;
				echo 2;
			} else {
				echo 1;
			}
		} else {
			echo 0;
		}
		mysqli_close($conn);
	}
?>