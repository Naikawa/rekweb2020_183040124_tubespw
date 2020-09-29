<?php 

// menghubungkan dengan database
$conn = mysqli_connect("localhost", "root", "", "reyhan");
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// menambahkan data buku

function tambah($data) {
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$gambar = upload();
		if( !$gambar ) {
			return false;
		}
	$kode_buku = htmlspecialchars($data["kode_buku"]);
	$nama_buku = htmlspecialchars($data["nama_buku"]);
	$jumlah_halaman = htmlspecialchars($data["jumlah_halaman"]);
	$Penulis = htmlspecialchars($data["penulis"]);
	$harga = htmlspecialchars($data["harga"]);


	$query = "INSERT INTO buku
				VALUES
			  ('$id', '$gambar', '$kode_buku', '$nama_buku', '$jumlah_halaman', '$Penulis', '$harga')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

// mengubah data buku

function ubah($data) {
	global $conn;

	$id = htmlspecialchars($data["id"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
		if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
		} 	
		else {
		$gambar = upload();
		}
	$kode_buku = htmlspecialchars($data["kode_buku"]);
	$nama_buku = htmlspecialchars($data["nama_buku"]);
	$jumlah_halaman = htmlspecialchars($data["jumlah_halaman"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$harga = htmlspecialchars($data["harga"]);


	$query = "UPDATE buku SET
				id = '$id', 
				gambar = '$gambar', 
				kode_buku = '$kode_buku', 
				nama_buku = '$nama_buku', 
				jumlah_halaman = '$jumlah_halaman', 
				Penulis = '$Penulis', 
				harga = '$harga'
			WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}



// upload gambar

function upload() {

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

		// menampilkan bahwa belum ada gambar yang di upload
		if( $error === 4 ) {
			echo "<script>
					alert('pilih gambar terlebih dahulu!');
					</script>";
			return false;
		}

	// gambar yang di upload berupa ekstensi gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
			echo "<script>
					alert('yang anda upload bukan gambar!');
					</script>";
			return false;
		}

		// memberikan ukuran file gambar yang di upload
		if( $ukuranFile > 1000000 ) {
			echo "<script>
					alert('ukuran gambar terlalu besar!');
			</script>";
			return false;
		}

	// mengganti nama gambar menjadi unik agar tidak ada nama yang sama
	$namaFileBaru = 'buku '. uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;
}



// fungsi untuk menghapus

function hapus($id) {
		global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
		return mysqli_affected_rows($conn);
}


// fungsi registrasi untuk menambahkan user baru

function registrasi($data) {
		global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

		if( mysqli_fetch_assoc($result) ) {
			echo "<script>
					alert('username sudah terdaftar!')
			      </script>";
			return false;
		}

		if( $password !== $password2 ) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!');
			      </script>";
			return false;
		}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO user VALUES('$username', '$password')");

		return mysqli_affected_rows($conn);

}

// fungsi registrasi untuk menambahkan admin baru

function registrasiAdmin($data) {
		global $conn;

	$admin_name = strtolower(stripslashes($data["admin_name"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	$result = mysqli_query($conn, "SELECT admin_name FROM admin WHERE admin_name = '$admin_name'");

		if( mysqli_fetch_assoc($result) ) {
			echo "<script>
					alert('admin_name sudah terdaftar!')
			      </script>";
			return false;
		}

		if( $password !== $password2 ) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!');
			      </script>";
			return false;
		}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO admin VALUES('$admin_name', '$password')");

		return mysqli_affected_rows($conn);

}


// fungsi cari

function cari($keyword) {
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
		return query($query);
}


?>