<?php

	require_once __DIR__ . '/vendor/autoload.php';
	require 'functions.php';
	$buku = query("SELECT * FROM buku");
	$mpdf = new \Mpdf\Mpdf();
	$html = '
				<!DOCTYPE html>
				<html lang="en">
					<head>
						<meta charset="UTF-8">
						<title>Halaman Buku</title>
			   		 <link rel="stylesheet" href="css/halaman.css">

					</head>
					<body>
						
						<h1> Daftar Buku </h1>
						<table border="1" cellpadding="10" cellspacing="0">

						<tr>
							<th>#</th>
							<th>Gambar</th>
							<th>Kode Buku</th>
							<th>Nama</th>
							<th>Julah halaman</th>
							<th>Penulis</th>
							<th>Harga</th>

						</tr>';

					$i = 1;
					foreach( $buku as $bukusaya ) {
						$html .= '<tr>
							
									<td>' . $i++ . '</td>
									<td><img src="img/' . $bukusaya["gambar"]. '" width="60"></td>
									<td>' . $bukusaya["kode_buku"]. '</td>
									<td>' . $bukusaya["nama_buku"]. '</td>
									<td>' . $bukusaya["jumlah_halaman"]. '</td>
									<td>' . $bukusaya["Penulis"]. '</td>
									<td> Rp' . $bukusaya["harga"]. ',00</td>

						 		</tr>';
					}

					$html .='</table>
								
					</body>
				</html>

			';
	$mpdf->WriteHTML($html);
	$mpdf->Output('Daftar-Buku.pdf', 'I');

?>