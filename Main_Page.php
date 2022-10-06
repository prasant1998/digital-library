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
	<link rel="stylesheet" href="main_page1.css">
</head>

<body>
	<div class='w3-container' id='login' style='display:block'>
		<h3 style='color: #8383af; text-align: center; margin-top: -3px; text-shadow: 0px 0px 2px gray'>LOGIN</h3>
		<form id='form1'>
			<div class='col-25'><label for='user'>User ID :</label></div>
			<div class='col-75'><input type='text' id='user' name='id' placeholder='User ID' pattern='[0-9]+' required></div>
			<br>
			<div class='col-25'><label for='pass'>Password :</label></div>
			<div class='col-75'><input type='password' id='pass' name='pass' placeholder='Password' required></div>
			<br><br><br>
			<input type='submit' value='Login'>
		</form>
		<button id='new' onclick=flip(1) style='color: blue; margin-top: 40px; text-shadow: 0px 0px 1px blue'><u>New User ?</u></button>
		<p id='err' style='color: #99004d; text-shadow: 0px 0px 4px pink'></p>
	</div>
	<div class='w3-container w1' id='new_form' style='display:none'>
		<h3 style='color: #8383af; text-align: center; margin-top: -3px; text-shadow: 0px 0px 2px gray'>REGISTER</h3>
		<form id='form2' method='post' action='admin_insert.php' onsubmit='return chk()'>
			<div class='col-25'><label for='name'>Name :</label></div>
			<div class='col-75'><input type='text' id='name' name='name' placeholder='Name' pattern='[A-Za-z ]+' required></div>
			<br>
			<div class='col-25'><label for='addr'>Address :</label></div>
			<div class='col-75'><input type='text' id='addr' name='addr' placeholder='Address' required></div>
			<br>
			<div class='col-25'><label for='phno'>Phone No :</label></div>
			<div class='col-75'><input type='text' id='phno' name='phno' placeholder='Phone no' pattern='[0-9]{10}' required></div>
			<br>
			<div class='col-25'><label for='pass1'>Password :</label></div>
			<div class='col-75'><input type='password' id='pass1' placeholder='Min 4 letter' pattern='.{4,}' required></div>
			<br>
			<div class='col-25'><label for='pass2'>Retype Password :</label></div>
			<div class='col-75'><input type='password' id='pass2' name='pass' placeholder='Retype' required></div>
			<br>
			<input type='hidden' name='type' value='members'>
			<a href="http://localhost/MyFiles/main_page.php"><i class="fa fa-arrow-left fa-2x" style="margin-top: 60px; text-shadow: 0px 0px 2px grey"></i></a>
			<input type='submit' value='Submit' style="margin-top: 50px">
		</form>
	</div>
	<script>
		ival= <?php if(isset($_COOKIE['idlib'])) {echo $_COOKIE['idlib'];} else { echo 0;} ?>;
		if (ival) {
			$('#user').val(ival);
		}
	</script>
	<script src='main_page1.js'></script>
</body>
		