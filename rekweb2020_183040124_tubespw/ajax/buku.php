<?php 

require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM buku
                WHERE
              id LIKE '%$keyword%' OR
              gambar LIKE '%$keyword%' OR
              kode_buku LIKE '%$keyword%' OR
              nama_buku LIKE '%$keyword%' OR
              jumlah_halaman LIKE '%$keyword%' OR
              Penulis LIKE '%$keyword%' OR
              harga LIKE '%$keyword%'
        ";
$buku = query($query);


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
<table border="5" cellpadding="10" cellspacing="0"  width="1110">
      <tr style="background-image: url(img/footer_lodyas.png); color: white;"> 
        <th><a href='halamanAdmin' style="text-decoration: none; color: white;">No.</a></th>
        <th class="opsi">Opsi</th>
        <th>Gambar</th>
        <th><a href='halamanAdmin?orderby=kode_buku&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Kode Buku</a></th>
        <th><a href='halamanAdmin?orderby=nama_buku&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Nama</a></th>
        <th><a href='halamanAdmin?orderby=jumlah_halaman&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Julah halaman</a></th>
        <th><a href='halamanAdmin?orderby=Penulis&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Penulis</a></th>
        <th><a href='halamanAdmin?orderby=harga&pola=<?=$polabaru;?>' style="text-decoration: none; color: white;">Harga</a></th>
        <th class="opsi">Detail</th>

      </tr>

      <?php $i = 1; ?>
      <?php foreach( $buku as $bukusaya ) : ?>
        
      <tr>
        <td><?= $i; ?></td>
        <td class="opsi">
          <a href="mengubah?id=<?= $bukusaya["id"]; ?>"><button type="button" class="btn btn-primary"> Ubah </button></a> 
          <br><br>
          <a href="menghapus?id=<?= $bukusaya["id"]; ?>"  onclick="return confirm('Menghapus Data Buku?');"><button type="button" class="btn btn-danger">Hapus</button></a>
        </td>
        <td><a href="detail?id=<?php echo $bukusaya['id'] ?>">  <img src="img/<?= $bukusaya["gambar"]; ?>" width="130"> </a></td>
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