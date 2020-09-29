<?php 
	session_start();
	require 'functions.php';


	if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];


		$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);
		


		if( $key === hash('sha256', $row['username']) ) {
			$_SESSION['login'] = true;
		}


	}

	if( isset($_SESSION["login"]) ) {
		header("Location: halamanUser");
		exit;
	}


	if( isset($_POST["login"]) ) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");


		if( mysqli_num_rows($result) === 1 ) {

			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {

				$_SESSION["login"] = true;


				if( isset($_POST['remember']) ) {
			
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['username']), time()+60);
				}

				header("Location: halamanUser");
				exit;
			}
		}

		$error = true;

	}

	?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/loginku.css">
	<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
    <form method="post">
	<div class="login">
		<div class="avatar">
			<i class="fa fa-book"></i>
		</div>

		<h2>User Login</h2>
		<div class="box-login">
			<i class="fas fa-user"></i>
				<input type="text" placeholder="Username" id="username" name="username">
		</div>
			<div class="box-login">
			<i class="fas fa-lock"></i>
				<input type="password" placeholder="Password" id="password" name="password">
		</div>

		  <div>
				<?php if( isset($error) ) : ?>
				<p style="color: red; font-style: italic;">username / password salah</p>
				<?php endif; ?>
		  </div>

	<div class="top">
		    <label><input type="checkbox"> Remember me</label>
		</div>
		
		<div class="top">
			<a href="">Forgot Password?</a>
		</div>
			
		<button type="submit" name="login" class="btn-login">Login
		</button>



		<div class="bottom">
			<a href="registrasiku.php">Registrer</a>
			<a href="loginadminku.php">Login as Admin</a>
		</div>

</form>

	</div>

</body>
</html>