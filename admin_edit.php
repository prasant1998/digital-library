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
		if ($type == 'books') {
			$id = test_input($_POST['id']);
			$bk_name = test_input($_POST['bk_name']);
			$author = test_input($_POST['author']);
			$quant = test_input($_POST["quant"]);
			$price = test_input($_POST["price"]);
			$sql= "select count(book_name) as bn from books where book_name='$bk_name' and author='$author'";
			$res=mysqli_query($conn, $sql);
			$res=mysqli_fetch_object($res);
			if ($res->bn == 0) {
				$sql = "update books set book_name = '$bk_name', author = '$author', quantity = '$quant', price = '$price' where id = '$id'";
				mysqli_query($conn, $sql);
				echo true;
			} else {
				return false;
			}
		} 
		elseif ($type == 'members') {
			$id = test_input($_POST['id']);
			$name = test_input($_POST['name']);
			$address = test_input($_POST['address']);
			$phno = test_input($_POST['phno']);
			$passwd = test_input($_POST['passwd']);
			$sql="select count(id) as ant from members where ((name='$name' and address='$address') or phone_no='$phno') and id<>'$id'";
			$res=mysqli_query($conn, $sql);
			$res=mysqli_fetch_object($res);
			if ($res->ant == 0) {
				$sql = "update members set name = '$name', address = '$address', phone_no = '$phno', passwd = '$passwd' where id = '$id'";
				mysqli_query($conn, $sql);
				$row= array("id"=>$id, "name"=>$name, "address"=>$address, "phone_no"=>$phno, "passwd"=>$passwd);
				$_SESSION["details"]=$row;
				echo true;
			} else {
				return false;
			}
		}	
		mysqli_close($conn);
	}
?>