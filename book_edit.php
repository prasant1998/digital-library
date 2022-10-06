<?php
	session_start();
	if(!isset($_SESSION["check"])) {
		session_destroy();
		header("location: http://localhost/MyFiles/main_page.php");
	}
?>
<!doctype HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="w3.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="book_edit1.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar" onmouseleave=w3_close()>
		<button onclick=w3_close() class="w3-bar-item w3-large w3-green w3-text-white" style="text-shadow: 0 0 0.5px white">close &times;</button>
		<a href="http://localhost/MyFiles/personal.php" class="w3-bar-item w3-button w3-hover-light-grey">Home <i class="fas fa-home w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/acc.php" class="w3-bar-item w3-button w3-hover-light-grey">My Account <i class="fas fa-edit w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/book_edit.php" class="w3-bar-item w3-button w3-purple w3-text-white">Book-keeping <i class="fa fa-book w3-text-white"></i></a>
		<a href="http://localhost/MyFiles/ses_close.php" class="w3-bar-item w3-button w3-hover-light-grey">Logout <i class="fa fa-sign-out w3-text-grey"></i></a>
	</div>
	<div class='w3-panel w3-hover-opacity flex-container' style='margin-top:0px; background-color: orange'><button class="w3-button w3-orange w3-xlarge w3-hover-red w3-text-white" style='margin-top: -1px; border-radius: 0.2em; margin-left: -17px' onmouseenter=w3_open()>&#9776;</button><b style='margin-left:40%; font-size: 1.5em; color: white; text-shadow: 0 0 4px #734b26'>Book-Keeping</b><button id='us' style='float: right; color: #404040; text-shadow: 0px 0px 2px grey; background-color: #ffd9b3; border-radius: 8px; border: 0.5px solid #ccc; margin-top: 8px; padding: 4px 12px 4px 12px'></button></div>
	<div id='bk_edit'>
		<div class='w3-container'>
			<label for='adm_pa'>Admin Password :</label>
			<input type='password' name='adm-pa' id='adm_pa'>
			<h3 style='color: #99004d; display: none; text-shadow: 0px 0px 2px pink' id='warn'>Wrong Password !</h3>
			<a href='http://localhost/MyFiles/personal.php'><i class="fa fa-arrow-left fa-2x" style="margin-top: 10px; text-shadow: 0px 0px 2px grey"></i></a>
		</div>
	</div>
	<script>
		idk = <?php echo json_encode($_SESSION["details"]["id"]);?>;
	</script>
	<script src='book_edit1.js'></script>
</body>
</html>