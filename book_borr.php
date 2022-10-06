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
		$sql = "select count(mem_id) as cou from book_members where book_id='$book_id'";
		$row= mysqli_query($conn,$sql);
		$c1=mysqli_fetch_object($row);
		$sql = "select quantity from books where id='$book_id'";
		$row= mysqli_query($conn,$sql);
		$c2=mysqli_fetch_object($row);
		if ($c1->cou < $c2->quantity) {
			$sql = "select count(book_id) as cou from book_members where mem_id= '$mem_id'";
			$row=mysqli_query($conn,$sql);
			$c=mysqli_fetch_object($row);
			if ($c->cou == 2) {
				mysqli_close($conn);
				echo 1;
				die();
			}
			$sql = "insert into book_members values('$mem_id','$book_id')";
			mysqli_query($conn,$sql);
		} else {
			mysqli_close($conn);
			echo 0;
			die();
		}
		mysqli_close($conn);
		echo 2;
	}
?>