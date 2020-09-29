<?php 	
    if (!isset($_GET['id'])) {
    		header("location: index");
    }
    require 'functions.php';
    $id = $_GET['id'];
    $bukusaya = query("SELECT * FROM buku WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html>
    <head>
    	<title>Document</title>
    	<link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

        
    </head>

    <body>
        <div class="container jarakDetail">
        	<div class="row">
        		<div class="mx-auto bakround2">


                 <div style="text-align: center;"> <img src="img/<?= $bukusaya["gambar"]; ?>" width="200"> </div>


                <table border="0" cellpadding="10" cellspacing="0" class="detail">


                    <tr>
                        <td> Nomor</td>
                        <td>:</td>
                        <td><?= $id; ?></td>
                    </tr>
                    <tr>
                        <td>Kode buku</td>
                        <td>:</td>
                        <td><?= $bukusaya["kode_buku"]; ?></td>
                    </tr>
                    <tr>
                        <td> Nama Buku </td>
                        <td>:</td>
                        <td><?= $bukusaya["nama_buku"]; ?></td>
                    </tr>
                    <tr>
                        <td> Jumlah Halaman</td>
                        <td>:</td>
                        <td><?= $bukusaya["jumlah_halaman"]; ?> </td>
                    </tr>
                    <tr>
                        <td> Penulis </td>
                        <td>:</td>
                        <td> <?= $bukusaya["Penulis"]; ?></td>
                    </tr>
                    <tr>
                        <td> Harga </td>
                        <td>:</td>
                        <td>Rp <?= $bukusaya["harga"]; ?> ,00</td>
                    </tr>

                </table>

                <div style="text-align: center;"> 
                    <button class="btn btn-danger" onclick="goBack()"><i class="fas fa-backward"></i> Kembali</button>
                </div>

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


