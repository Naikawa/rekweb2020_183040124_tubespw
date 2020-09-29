<?php 
	require 'functions.php';

	if( isset($_POST["register"]) ) {

		if( registrasi($_POST) > 0 ) {
			echo "<script>
					alert('user baru berhasil ditambahkan!');
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

		<form action="" method="post">
	<div class="register-box">
		<h1>Registration</h1>


		<div class="textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" placeholder="Username" name="username" id="username">
		</div>
		<div class="textbox">
		<i class="fa fa-lock" aria-hidden="true"></i>
			<input type="password" placeholder="Password" name="password" id="password">
		</div>
			<div class="textbox">
				<i class="fa"></i>
			<input type="password" placeholder="Repeat Password" name="password2" id="password2">
		</div>
<input class="btn" type="button" name="register" id="register" value="Sign up"></input>

		<div class="bottom">
			<a href="loginku.php">Back</a>
		</div>
	</div>
	</form>


</body>
</html>