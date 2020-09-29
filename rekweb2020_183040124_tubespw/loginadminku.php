<?php 
	session_start();
	require 'functions.php';


	if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];


		$result = mysqli_query($conn, "SELECT admin_name FROM admin WHERE id = $id");
		$row = mysqli_fetch_assoc($result);


		if( $key === hash('sha256', $row['admin_name']) ) {
			$_SESSION['loginAdmin'] = true;
		}


	}

	if( isset($_SESSION["loginAdmin"]) ) {
		header("Location: halamanAdmin");
		exit;
	}


	if( isset($_POST["loginAdmin"]) ) {

		$admin_name = $_POST["admin_name"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_name = '$admin_name'");


		if( mysqli_num_rows($result) === 1 ) {

			$row = mysqli_fetch_assoc($result);
			if( password_verify($password, $row["password"]) ) {

				$_SESSION["loginAdmin"] = true;


				if( isset($_POST['remember']) ) {
			
					setcookie('id', $row['id'], time()+60);
					setcookie('key', hash('sha256', $row['admin_name']), time()+60);
				}

				header("Location: halamanAdmin");
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

		<h2>Admin Login</h2>
		<div class="box-login">
			<i class="fas fa-user"></i>
				<input type="text" placeholder="Username" name="admin_name" id="admin_name">
		</div>
			<div class="box-login">
			<i class="fas fa-lock"></i>
				<input type="password" placeholder="Password" name="password" id="password">
		</div>


         <div>
		<?php if( isset($error) ) : ?>
		<p style="color: red; font-style: italic;">username / password salah</p>
		<?php endif; ?>
		 </div>


		<button type="submit" class="btn-login" name="loginAdmin">Login
		</button>

		<div class="bottom">
			<a href="loginku.php">Back</a>
			<a href="">Forgot Password</a>
		</div>

	</div>
</form>

</body>
</html>