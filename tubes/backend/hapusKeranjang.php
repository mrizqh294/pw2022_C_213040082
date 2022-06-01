<?php 

require 'function.php';

session_start();

if (!isset($_SESSION['loginUser'])) {
  header("location: ../index.php");
  exit;
}


$id = $_GET["id_keranjang"];

if (hapusKeranjang ($id) >0) {
	echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href='../interface/keranjang.php';
			</script>
		";
}

else {
	echo "
			<script>
				alert('Data gagal dihapus');
				document.location.href='../interface/keranjang.php';
			</script>
		";
}

 ?>