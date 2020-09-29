<!-- php -->

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

<!-- html -->

<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Registrasi</title>
		<style>
			label {
				display: block;
			}
		</style>
		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/styleRegis.css">
		<link rel="icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		


	</head>

	<body>
		<div class="container jarak">
			<div class="row">
				<div class="mx-auto bakround1">

				<h1>Halaman Registrasi</h1>

				<form action="" method="post">
					<table border="0" cellpadding="10" cellspacing="0">
						<tr>
					        <td> <label for="username">username</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="username" id="username"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="password">password</label> </td>
					        <td>:</td>
					        <td> <input type="password" name="password" id="password"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="password2">konfirmasi password</label> </td>
					        <td>:</td>
					        <td> <input type="password" name="password2" id="password2"> </td>
				    	</tr>

				    	<tr>
				    		<td> 
					        	<a href="index">
									<button type="button" class="btn btn-danger"><i class="fas fa-backward"></i> Kembali</button>
								</a>
							</td>
					        <td>  </td>
					        <td> <button type="submit" class="btn btn-primary" name="register" id="register">Register! <i class="fas fa-plus-circle"></i></button> </td>
				    	</tr>
					</table>
				</form>

				</div>
			</div>
		</div>
	</body>
</html>
