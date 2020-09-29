<!-- php -->

<?php
	session_start();
	require 'functions.php';

	if( !isset($_SESSION["loginAdmin"]) ) {
		header("Location: index");
		exit;
	}

	$id = $_GET["id"];
	// query data buku berdasarkan id buku
	$bukusaya = query("SELECT * FROM buku WHERE id = $id")[0];
	// jika tombol submit ditekan maka
	if( isset($_POST["submit"]) ) {
	// menampilkan pemberitahuan buku telah ditambah atau tidak
		if( ubah($_POST) > 0 ) {
			echo "
				<script>
					alert('data BUKU berhasil diubah!');
					document.location.href = 'loginAdmin.php';
				</script>
			";
		} 
		else {
			echo "
				<script>
					alert('data BUKU gagal diubah!');
					document.location.href = 'loginAdmin.php';
				</script>
			";
		}
	}
?>

<!-- html -->

<!DOCTYPE html>
<html>
	<head>
		<title>Ubah data Buku</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/style2.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="icon" href="img/favicon.png" type="image/png">
		

	</head>

	<body>

		<div class="container jarak">
			<div class="row">
				<div class="mx-auto bakround1">

				<h1>Ubah data Buku</h1>
		       	<img src="img/giphyBook.gif" alt="" class="giphyBook">

				<form action="" method="post" enctype="multipart/form-data">
					<table border="0" cellpadding="10" cellspacing="0">
						<input type="hidden" name="id" value="<?= $bukusaya["id"]; ?>">
						<input type="hidden" name="gambarLama" value="<?= $bukusaya["gambar"]; ?>">
		
						<tr>
					        <td> <label for="id">ID Buku</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="id" id="id" required value="<?= $bukusaya["id"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="gambar">Gambar</label> </td>
					        <td>:</td>
					        <td><img src="img/<?= $bukusaya["gambar"]; ?>" width="40"> <input type="file" name="gambar" id="gambar" required value="<?= $bukusaya["gambar"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="kode_buku">Kode Buku</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="kode_buku" id="kode_buku" required value="<?= $bukusaya["kode_buku"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="nama_buku">Nama Buku</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="nama_buku" id="nama_buku" required value="<?= $bukusaya["nama_buku"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="jumlah_halaman">Jumlah Halaman</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="jumlah_halaman" id="jumlah_halaman" required value="<?= $bukusaya["jumlah_halaman"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="Penulis">Penulis</label> </td>
					        <td>:</td>
					        <td> <input type="text" name="Penulis" id="Penulis" required value="<?= $bukusaya["Penulis"]; ?>"> </td>
				    	</tr>

				    	<tr>
					        <td> <label for="harga">Harga</label> </td>
					        <td>:</td>
					        <td>Rp <input type="text" name="harga" id="harga" required value="<?= $bukusaya["harga"]; ?>"> ,00</td>
				    	</tr>

				    	<tr>
					        <td> 
					        	<div style="text-align: center;"> 
									<button class="btn btn-danger" onclick="goBack()"><i class="fas fa-backward"></i> Kembali</button>
								</div> 
							</td>
					        <td></td>
					        <td> <button class="btn btn-primary" type="submit" name="submit">Ubah Data! <i class="fas fa-check"></i></button> </td>
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