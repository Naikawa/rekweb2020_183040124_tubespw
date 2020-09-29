<?php 
	session_start();
	require 'functions.php';

	if( !isset($_SESSION["loginAdmin"]) ) {
		header("Location: index");
		exit;
	}

	if( isset($_POST["registerAdmin"]) ) {

		if( registrasiAdmin($_POST) > 0 ) {
			echo "<script>
					alert('Admin baru berhasil ditambahkan!');
				  </script>";
		} else {
			echo mysqli_error($conn);
		}
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/registrasiku.css">
</head>
<body>
	<div class="register-box">
		<h1>Registration</h1>
		<div class="textbox">
			<i class="fa fa-user" aria-hidden="ture"></i>
			<input type="text" placeholder="Username" name="" value="">
		</div>
		<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="">
		</div>
			<div class="textbox">
				<i class="fa"></i>
			<input type="password" placeholder="Repeat Password"name="">
		</div>
<input class="btn" type="button" name="" value="Sign up"></input>

		<div class="bottom">
			<a href="halamanAdmin.php">Back</a>
		</div>


	</div>
</body>
</html>