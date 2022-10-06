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
		$mem_id=test_input($_POST["mem_id"]);
		$sql="select id, book_name, author, price from books where id in (select book_id from book_members where mem_id='$mem_id')";
		$res=mysqli_query($conn, $sql);
		$store=array();
		if(mysqli_num_rows($res)>0) {
			while($row=mysqli_fetch_assoc($res)) {
				$store[$row["book_name"]]=$row["author"]."!".$row["id"]."!".$row["price"];
			}
		}
		else {
			mysqli_close($conn);
			return false;
		}
		echo json_encode($store);
		mysqli_close($conn);
	}
?>