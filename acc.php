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
	<link rel="stylesheet" href="acc1.css"> 
</head>
<body>
	<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar" onmouseleave=w3_close()>
		<button onclick=w3_close() class="w3-bar-item w3-large w3-green w3-text-white" style="text-shadow: 0 0 0.5px white">close &times;</button>
		<a href="http://localhost/MyFiles/personal.php" class="w3-bar-item w3-button w3-hover-light-grey">Home <i class="fas fa-home w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/acc.php" class="w3-bar-item w3-button w3-purple w3-text-white">My Account <i class="fas fa-edit w3-text-white"></i></a>
		<a href="http://localhost/MyFiles/book_edit.php" class="w3-bar-item w3-button w3-hover-light-grey">Book-keeping <i class="fa fa-book w3-text-grey"></i></a>
		<a href="http://localhost/MyFiles/ses_close.php" class="w3-bar-item w3-button w3-hover-light-grey">Logout <i class="fa fa-sign-out w3-text-grey"></i></a>
	</div>
	<div class='w3-panel w3-hover-opacity flex-container' style='margin-top:0px; background-color: orange'><button class="w3-button w3-orange w3-xlarge w3-hover-red w3-text-white" style='margin-top: -1px; border-radius: 0.2em; margin-left: -17px' onmouseenter=w3_open()>&#9776;</button><b style='margin-left:40%; font-size: 1.5em; color: white; text-shadow: 0 0 4px #734b26'>My Account</b><button id='us' style='float: right; color: #404040; text-shadow: 0px 0px 2px grey; background-color: #ffd9b3; border-radius: 8px; border: 0.5px solid #ccc; margin-top: 8px; padding: 4px 12px 4px 12px'></button></div>
	<div class='w3-container w1'>
		<h3 style='color: #1a1100; text-align: center; margin-top: 0px; text-shadow: 0px 0px 2px gray'>DETAILS</h3>
		<label for='name'>Name </label>
		<input type='text' disabled>
		<br>
		<label for='addr'>Address </label>
		<input type='text' disabled>
		<br>
		<label for='phno'>Phone No </label>
		<input type='text' disabled>
		<button onclick=edit_acc(1) class='w3-btn fas fa-edit fa-lg w3-text-white w3-round-large w3-ripple' style='background-color: #009900; margin: 5% 5% 2% 30%'><small>   edit</small></button>
		<button onclick=edit_acc(2) class='w3-btn w3-text-white w3-round-large w3-ripple w3-blue w3-small' style='margin: 1.5% 5% 2% 6%'><small>Change Password</small></button>
		<button onclick=delet() class='w3-btn fa fa-trash-o fa-lg w3-text-white w3-round-large w3-ripple w3-red' style='margin: 0% 5% 2% 6%; padding: 1.35% 2% 1.1% 2%'><small style='padding: 5%'>     account</small></button>
	</div>
	<div style='display:none; background-color: #ccffe6; box-shadow: 0px 0px 4px 2px  #ccffe6' class='.w3-container w2'>
		<form id='subm'>
			<h3 style='color: #003300; text-align: center; margin-top: 0px; text-shadow: 0px 0px 2px gray'>EDIT ACCOUNT</h3>
			<label for='name'>Name :</label>
			<input type='text' id='name' pattern='[A-Za-z ]+' required>
			<br>
			<label for='addr'>Address :</label>
			<input type='text' id='addr' required>
			<br>
			<label for='phno'>Phone No :</label>
			<input type='text' id='phno' pattern='[0-9]{10}' required>
			<br>
			<i onclick=edit_acc(0) class="fa fa-arrow-left fa-2x" style="margin-top: 50px; margin-left: 21px; text-shadow: 0px 0px 2px grey; cursor: pointer"></i>
			<button type='submit' class='w3-btn'>Submit</button>
		</form>
	</div>
	<div style='display:none; background-color: #99c2ff; box-shadow: 0px 0px 4px 2px #99c2ff' class='.w3-container w3'>
		<form id='subm1'>
			<h3 style='color: #000033; text-align: center; margin-top: 0px; text-shadow: 0px 0px 2px gray'>CHANGE PASSWORD</h3>
			<label for='pass0'>Old Password :</label>
			<input type='password' id='pass0' placeholder='Min 4 letter' pattern='.{4,}' required>
			<label for='pass1'>New Password :</label>
			<input type='password' id='pass1' placeholder='Min 4 letter' pattern='.{4,}' required>
			<br>
			<label for='pass2'>Retype Password :</label>
			<input type='password' id='pass2' name='pass' placeholder='Retype' required>
			<span><i class="fa fa-close fa-2x" style="color: red; text-shadow: 1px 2px 2px gray; margin-top: 1.8%; margin-left: 2%; visibility: hidden"></i></span>
			<br>
			<br>
			<i onclick=edit_acc(0) class="fa fa-arrow-left fa-2x" style="margin-top: 37px; margin-left: 21px; text-shadow: 0px 0px 2px grey; cursor: pointer"></i>
			<button type='submit' class='w3-btn'>Submit</button>
		</form>
		<br>
		<p id='err' style='color: #99004d; text-shadow: 0px 0px 4px pink; margin-left: 3%'></p>
	</div>
	<script>
		det=<?php echo json_encode(array_values($_SESSION["details"])); ?>;
	</script>
	<script src='acc1.js'></script>
</body>
</html>	