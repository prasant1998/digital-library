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
	<title>Personal Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="w3.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<link rel="stylesheet" href="personal1.css">
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-border-0" style="display:none" id="mySidebar" onmouseleave=w3_close()>
		<button onclick=w3_close() class="w3-bar-item w3-large w3-green w3-text-white" style="text-shadow: 0 0 0.5px white">close &times;</button>
		<a href="http://localhost/MyFiles/personal.php" class="w3-bar-item w3-button w3-purple w3-text-white">Home <i class="fas fa-home w3-text-white"></i></a>
		<a href="http://localhost/MyFiles/acc.php" class="w3-bar-item w3-button w3-hover-light-grey">My Account <i class="fas fa-edit w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/book_edit.php" class="w3-bar-item w3-button w3-hover-light-grey">Book-keeping <i class="fa fa-book w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/ses_close.php" class="w3-bar-item w3-button w3-hover-light-grey">Logout <i class="fa fa-sign-out w3-text-grey"></i></a>
	</div>
	<div class='w3-panel w3-hover-opacity flex-container' style='margin-top:0px; background-color: orange'><button class="w3-button w3-orange w3-xlarge w3-hover-red w3-text-white" style='margin-top: -1px; border-radius: 0.2em; margin-left: -17px' onmouseenter=w3_open()>&#9776;</button><b style='margin-left:43%; font-size: 1.5em; color: white; text-shadow: 0 0 4px #734b26'>Home</b><button id='us' style='float: right; color: #404040; text-shadow: 0px 0px 2px grey; background-color: #ffd9b3; border-radius: 8px; border: 0.5px solid #ccc; margin-top: 8px; padding: 4px 12px 4px 12px'></button></div>
	<h3 style='text-align: center; color: #000f0d; background-image: linear-gradient(to right, white, #71ebd7, white); opacity: 0.6; margin-bottom: 26px; margin-top: 15px'>Books Section :</h3>
	<h3 style='margin-left: 12%; color: #5c5c8a; text-shadow: 0px 0px 1px gray'>Books borrowed </h3>
	<b><hr style='margin-left: 10%; width: 80%; border: 0.5px solid gray; margin-top: -2px'></b>
	<div id='borr'></div><br><br><br>
	<h3 style='margin-left: 12%; color: #5c5c8a; text-shadow: 0px 0px 1px gray'>Available Books<button id='bor_open' class="w3-btn w3-circle w3-small w3-padding-small w3-ripple w3-hover-black w3-white" style='margin-left: 55%; box-shadow: 0px 0px 4px 0.2px gray' onclick=book_disp()><i class="fa fa-angle-down w3-hover-text-white w3-text-grey" style="font-size: 30px; margin: -2px 0px -2px 0px"></i></button></h3>
	<b><hr style='margin-left: 10%; width: 65%; border: 0.4px dashed gray; margin-top: -2px; box-shadow: 0px 2px 4px 0.3px gray'></b><br>
	<div id='avail_bk' style='display: none'></div>
	<script>
		id = <?php echo json_encode($_SESSION["details"]["id"]);?>;
	</script>
	<script src='personal1.js'></script>
</body>
</html>
		