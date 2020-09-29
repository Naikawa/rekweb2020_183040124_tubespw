<!-- <?php
	session_start();
	require 'functions.php';

	if( !isset($_SESSION["loginAdmin"]) ) {
		header("Location: index");
		exit;
	}
	if( isset($_POST["submit"]) ) {
		
		if( tambah($_POST) > 0 ) {
			echo "
				<script>
					alert('Data Buku berhasil ditambahkan!');
					document.location.href = 'loginAdmin';
				</script>
			";
		} else {
			echo "
				<script>
					alert('Data Buku gagal ditambahkan!');
					document.location.href = 'loginAdmin';
				</script>
			";
		}
	}
?> -->
<!DOCTYPE html>
<html>
	<head>
		<title>Tambah Data Buku</title>
	    <link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/style2.css">
	    <link rel="icon" href="img/favicon.png" type="image/png">
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="icon" href="img/favicon.png" type="image/png">



	</head>
	<body>
		<div class="container jarak">
			<div class="row">
				<div class="mx-auto bakround1">
					<h1>Tambah Data Buku</h1>
		       		<img src="img/giphyBook.gif" alt="" class="giphyBook">


					<form action="" method="post" enctype="multipart/form-data">
						<table border="0" cellpadding="10" cellspacing="0">
							<tr>
						        <td> <label for="id"> ID Buku </label> </td>
						        <td>:</td>
						        <td><input type="text" name="id" id="id" required></td>
					    	</tr>

					    	<tr>
						        <td> <label for="gambar">Gambar </label> </td>
						        <td>:</td>
						        <td> <input type="file" name="gambar" id="gambar"> </td>
					    	</tr>

					    	<tr>
						        <td> <label for="kode_buku">Kode Buku </label>  </td>
						        <td>:</td>
						        <td> <input type="text" name="kode_buku" id="kode_buku"> </td>
					    	</tr>

					    	<tr>
						        <td> <label for="nama_buku"> Nama Buku </label> </td>
						        <td>:</td>
						        <td> <input type="text" name="nama_buku" id="nama_buku"> </td>
					    	</tr>

					    	<tr>
						        <td> <label for="jumlah_halaman">Jumlah Halaman </label> </td>
						        <td>:</td>
						        <td> <input type="text" name="jumlah_halaman" id="jumlah_halaman"> </td>
					    	</tr>

					    	<tr>
						        <td> <label for="Penulis">Penulis </label> </td>
						        <td>:</td>
						        <td> <input type="text" name="Penulis" id="Penulis"> </td>
					    	</tr>


					    	<tr>
						        <td> <label for="Penerbit">Penerbit </label> </td>
						        <td>:</td>
						        <td> <input type="text" name="Penerbit" id="Penerbit"> </td>
					    	</tr>

					    	<tr>
						        <td> <label for="harga">Harga </label> </td>
						        <td>:</td>
						        <td> <input type="text" name="harga" id="harga"> </td>
					    	</tr>

					    	<tr>
						        <td> <div style="text-align: center;"> 
									<button class="btn btn-danger" onclick="goBack()"><i class="fas fa-backward"></i> Kembali</button>
									</div>
								</td>
							    <td>  </td>
							    <td> <button class="btn btn-success" type="submit" name="submit">Tambah Data Buku! <i class="fas fa-check"></i></button> </td>
						    </tr>

						</table>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
    function goBack() {
        window.history.back();
    }
</script>