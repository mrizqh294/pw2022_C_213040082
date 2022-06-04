<?php 
  session_start();

  if (!isset($_SESSION['loginUser'])) {
    header("location: ../index.php");
    exit;
  }

  require 'function.php';

  require_once "./mpdf_v8.0.3-master/vendor/autoload.php";


  $userLogin = $_SESSION['userLogin'];

  $id_produk = $_GET['id'];

  $id = $userLogin['id_user'];

  $id_transaksi = $_GET['id_transaksi'];

  $t = query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.id_user = $id AND produk.kode_produk = $id_produk AND transaksi.id_transaksi = $id_transaksi" )[0];

  $empty = mysqli_query($db,"SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.id_user = $id ");


$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukti_pembelian</title>
	<style>
		.container {
			border: 1px solid black;
			width: 700px;
			margin: auto;
		}
		div .header,.main {
			width: 	700px;
			padding: 10px;
			box-sizing: border-box;
		}
		.header {
			border-bottom: 1px solid black;
		}

		.header h2 {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h2>Bukti Pembelian Produk</h2>
		</div>
		<div class="main">
			<p><span>Nama Produk : </span>'.$t['nama_produk'].'</p>
            <p><span>Merk : </span>'.$t['merk_produk'].'</p>
            <p><span>Jumlah Bayar : </span>Rp.'.$t['jumlah_transaksi'].'</p>
			<p><span>Nama Penerima : </span>'.$t['nama_user'].'</p>
			<p><span>Alamat Penerima : </span>'.$t['alamat_pengiriman'].'</p>
			<p><span>Waktu pemesanan : </span>'.$t['tanggal_transaksi'].'</p>
			<p>Status pemesanan : <span style="font-style :italic;">'.$t['status_transaksi'].'</span></p>
		</div>
	</div>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
$mpdf->WriteHTML($html);
$mpdf->Output();