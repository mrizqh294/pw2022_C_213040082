<?php 

require 'function.php';

session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}


$id= $_GET["kode_produk"];

if (hapus ($id) >0) {
	echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href='../interface/halaman_admin.php';
			</script>
		";
}

else {
	echo "
			<script>
				alert('Data gagal dihapus');
				document.location.href='../interface/halaman_admin.php';
			</script>
		";
}

 ?>