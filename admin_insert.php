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
		$type = test_input($_POST['type']);
		if ($type == 'books') {
			session_start();
				if(!isset($_SESSION["check"])) {
				session_destroy();
				header("location: http://localhost/MyFiles/main_page.php");
			}
			$bk_name = test_input($_POST['bk_name']);
			$author = test_input($_POST['author']);
			$quant = test_input($_POST["quant"]);
			$price = test_input($_POST["price"]);
			$sql= "select count(book_name) as bn from books where book_name='$bk_name' and author='$author'";
			$res=mysqli_query($conn, $sql);
			$res=mysqli_fetch_object($res);
			if ($res->bn == 0) {
				$sql = "insert into books(book_name, author, quantity, price) values('$bk_name','$author', '$quant', '$price')";
				mysqli_query($conn, $sql);
				echo true;
			} else {
				return false;
			}
		} 
		elseif ($type == 'members') {
			$name = test_input($_POST['name']);
			$address = test_input($_POST['addr']);
			$phno = test_input($_POST['phno']);
			$passwd = test_input($_POST['pass']);
			$sql="select id from members where phone_no='$phno'";
			$res=mysqli_query($conn, $sql);
			if(mysqli_num_rows($res) > 0) {
				echo "<h2 style='color:red; text-align: center; background-image: linear-gradient(to right, white, #ccffff, white); text-shadow: 0px 0px 0.6px #4d0026; margin-top: 10%; padding: 10px'>Phone No already exixts !</h2>";
				header("refresh: 4; URL= http://localhost/MyFiles/main_page.php");
				die();
			}	
			$sql="select id from members where name='$name' and phone_no='$phno'";
			$res=mysqli_query($conn, $sql);
			if(mysqli_num_rows($res) > 0) {
				echo "<h2 style='color:red; text-align: center; background-image: linear-gradient(to right, white, #ccffff, white); text-shadow: 0px 0px 0.6px #4d0026; margin-top: 10%; padding: 10px'>Account already exixts !</h2>";
				header("refresh: 4; URL= http://localhost/MyFiles/main_page.php");
				die();
			}	
			$sql = "insert into members(name, address, phone_no, passwd) values('$name','$address', '$phno', '$passwd')";
			$res=mysqli_query($conn, $sql);
			if ($res) {
				$sql = "Select id from members where phone_no='$phno'";
				$res=mysqli_query($conn, $sql);
				$row=mysqli_fetch_assoc($res);
				setcookie('idlib', $row['id'], time() + (86400 * 365), "/");
				echo "<h2 style='color: #4d0026; text-align: center; background-image: linear-gradient(to right, white, #ccffff, white); text-shadow: 0px 0px 0.6px #4d0026; margin-top: 10%; padding: 10px'>your User ID is <b style='color: #003300'>$row[id]</b>.</h2>";
				echo "<h3 style='color: gray; text-align: center; text-shadow: 0px 0px 0.4px gray; margin-top: 1%'>Please remember it !</h3>";
				echo "<a href='http://localhost/MyFiles/main_page.php'><button style='margin-left: 44%; box-shadow: 0px 0px 4px 2px #ccc; background-color: #ffe6ff; color: #330000; border: 0.2px solid #ccc; border-radius: 6px; margin-top: 5%; font-size: 1.25em; padding: 5px'>Go to Login Page</button></a>";
			} else {
				echo "<h2 style='color:red'>Account creation Unsuccessful</h2>";
				header("refresh: 4; URL= http://localhost/MyFiles/main_page.php");
			}
		}
		mysqli_close($conn);
	}
?>
		