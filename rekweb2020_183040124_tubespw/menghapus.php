<?php 
	session_start();
	require 'functions.php';

	if( !isset($_SESSION["loginAdmin"]) ) {
		header("Location: index");
		exit;
	}
	$id = $_GET["id"];
		if( hapus($id) > 0 ) {
			echo "
				<script>
					alert('Data Buku Berhasil dihapus!');
					document.location.href = 'loginAdmin.php';
				</script>
			";
		} 
		else {
			echo "
				<script>
					alert('Data Buku Tidak Jadi Di Hapus!');
					document.location.href = 'loginAdmin.php';
				</script>
			";
		}
?>