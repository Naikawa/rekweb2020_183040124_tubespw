<?php 
	session_start();

	if( !isset($_SESSION["login"]) ) {
		header("Location: loginku");
		exit;
	}

	require 'functions.php';


	$buku = query("SELECT * FROM buku");

	if( isset($_POST["cari"]) ) {
		$buku = cari($_POST["keyword"]);
	}


	$pola='asc';
	$polabaru='asc';
	if(isset($_GET['orderby'])){
		$orderby=$_GET['orderby'];
		$pola=$_GET['pola'];
		
	$buku = query("SELECT * FROM buku order by $orderby $pola");

		if($pola=='asc'){
			$polabaru='desc';
			
		}else{
			$polabaru='asc';
		}
	}

	if( isset($_POST["cari"]) ) {
		$buku = cari($_POST["keyword"]);
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Halaman Buku</title>
		<style>

		</style>
		<!-- css -->
	    <link rel="stylesheet" href="css/bootstrap.css">
	    <link rel="stylesheet" href="css/halaman.css">
	   	<link rel="icon" href="img/favicon.png" type="image/png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


	    <!-- font -->
	    <link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=El+Messiri|Monoton" rel="stylesheet">

	</head>

	<body>

		<!-- Bagian Navbar -->

		<nav class="navbar navbar-dark bg-dark fixed-top jenisfont">
		  <a class="navbar-brand colorbrand" href="#">Daftar Buku </a>
			<form class="form-inline" action="" method="post">
				<input class="form-control" type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
				<button class="btn btn-outline-success my-2 my-sm-0" id="tombol-cari" type="submit" name="cari">Cari!</button>
			</form>
			<a href="logout" class="logout"><button type="button" class="btn btn-outline-light">Logout <i class="fas fa-sign-out-alt"></i></button></a>
		</nav><br><br><br>

		
		<!-- Bagian isi -->
		<div class="container">
				<br>
				<a href="cetak" target="_blank" class="opsi"> <button type="button" class="btn btn-dark">Cetak Daftar Buku <i class="fas fa-print"></i></button></a>
	
				<h1 class="text-center">Daftar Buku</h1>

				
				<br> <br>

		<!-- Tabel Daftar Buku -->



			<div class="mx-auto">
				<div id="container">		
					<table border="5" cellpadding="10" cellspacing="0"  width="1110">
			
						<tr style="	background-color: #333; color: white;"> 
							<th><a href='halamanUser' style="text-decoration: none; color: white;">No.</a></th>
							<th>Gambar</th>
							<th><a href='halamanUser?orderby=kode_buku&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Kode Buku</a> <i class="fas fa-sort"></th>
							<th><a href='halamanUser?orderby=nama_buku&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Nama</a> <i class="fas fa-sort"></th>
							<th><a href='halamanUser?orderby=jumlah_halaman&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Julah halaman</a> <i class="fas fa-sort"></th>
							<th><a href='halamanUser?orderby=Penulis&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Penulis</a> <i class="fas fa-sort"></th>
							<th><a href='halamanUser?orderby=harga&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Harga</a> <i class="fas fa-sort"></th>
							<th class="opsi">Detail</th>

						</tr>

						<?php $i = 1; ?>
						<?php foreach( $buku as $bukusaya ) : ?>
							
						<tr>
							<td><?= $i; ?></td>
							<td><a href="detail?id=<?php echo $bukusaya['id'] ?>">	<img src="img/<?= $bukusaya["gambar"]; ?>" width="130"> </a></td>
							<td><?= $bukusaya["kode_buku"]; ?></td>
							<td><?= $bukusaya["nama_buku"]; ?></td>
							<td><?= $bukusaya["jumlah_halaman"]; ?></td>
							<td><?= $bukusaya["Penulis"]; ?></td>
							<td>Rp <?= $bukusaya["harga"]; ?> ,00</td>
							<td class="opsi"><a href="detail?id=<?php echo $bukusaya['id'] ?>"> <img src="img/giphyRead.gif" alt="selengkapnya" width="150px"> </a></td>

						</tr>

					<?php $i++; ?>
					<?php endforeach; ?>

				</table>

				</div>
			</div>
		</div>
	</body>


	<!-- FOTTER-->
	  <footer>
	    <div class="container text-center">
	      <div class="row">
	        <div class="col-md">
	          <p>Copyright &copy; 2020 reyhan
	      </div>
	    </div>

	    <div class="container iconsosmed">
	      <div class="row"> 

	        <div class="col-md-4 jenisfont" id="follow">
	          Follow Me :
	        </div>
	        <div class="col-md-1">
	            <a href="https://github.com/Naikawa" target="blank_" title="Github"><img src="img/sosmed1.png"></a>
	        </div>
	      
	        <div class="col-md-1">
	            <a href="https://www.instagram.com/reyhan_rz23/" target="blank_" title="Instagram"><img src="img/sosmed3.png"></a>
	        </div>
	      
	        <div class="col-md-4 jenisfont">
	          Terima Kasih
	        </div>
	      </div>
	    </div>

	  </footer>

</html>

<!-- javascript -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/scriptUser.js"></script>
<script src="bootstrap.min.js"></script>
