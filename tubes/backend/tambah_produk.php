<?php 
//koneki ke database
require 'function.php';



session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}



//cek apakah tombol tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {


// cek apakah data berhasil di tambah atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil ditambahakan');
				document.location.href='../interface/halaman_admin.php';
			</script>
		";
	}
	else {
		echo "
			<script>
				alert('Data gagal ditambahakan');
				document.location.href='../interface/halaman_admin.php';
			</script>
		";
	}


}

 ?>



<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- my style -->
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=88">
    <link rel="stylesheet" type="text/css" href="responsive.css?x=10">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


    <title> Halaman Admin 294 Store Official</title>
  </head>
  <body>


    <!-- form tambah data -->

	<section class="w-100">
    	<div class="row text-center tambah_data mx-auto w-100 bg-light p-2">
            <div class="col-md-8 p-5 my-auto mx-auto bg-white LoTaUb shadow-sm">
	            <form  action="" method="post" enctype="multipart/form-data">
	              <div class="col-md-12">
	                <h3 class="text-center fw-bold">Tambah Data Produk</h3>
	                <hr class="text-center">
	              </div>
	              <form>
	              	<div class="row">
		              	<div class="col-md-4">
				              <div class="col-md-12">
				                <p class="text-center pt-2">Nama Produk :</p>
				                <input autocomplete="off" class="inputForm" type="text" name="nama_produk" placeholder="Nama Produk" required>
				              </div>
				              <div class="col-md-12">
				                <p class="text-center pt-2">Merk Produk:</p>
				                <input autocomplete="off" class="inputForm" type="text" name="merk_produk" placeholder="Merk Produk" required>
				              </div>
				              <div class="col-md-12">
				                <p class="text-center pt-2 ">Kategori</p>
				                <select name="id_kategori" class="inputForm" required>
				                		<option selected>Pilih Kategori</option>
					                	<option value="1">Gitar Akustik</option>
					                	<option value="2">Gitar Elektrik</option>
					                	<option value="3">Bass</option>
					                	<option value="4">Gear</option>
					                	<option value="5">Aksesoris</option>
				                </select>
				              </div>
		              	</div>
		              	<div class="col-md-4">
		              		<p class="fw-bold">Preview Gambar</p>
		              		<img src="../aset/img/noimage.jpg" id="prev" width="80%">
		              	</div>
		              	<div class="col-md-4">
		              		<div class="col-md-12">
				                <p class="text-center pt-2">Harga Produk:</p>
				                <input autocomplete="off" class="inputForm" type="text" name="harga_produk" placeholder="Harga"  required>
				              </div>
				              <div class="col-md-12">
				                <p class="text-center pt-2 ">Gambar Produk:</p>
				                <input autocomplete="off" class="inputForm form-control ms-3" type="file" name="gambar_produk" id="gambar_produk" onchange="preview()">
				              </div>
				              <div class="col-md-12">
				                <p class="text-center pt-2 ">Deskripsi produk:</p>
				                <textarea autocomplete="off"  name="desk_produk" class="inputForm" placeholder="Deskripsi" ></textarea>
				              </div>
		              	</div>
		              </div>
		              <div class="row">
		              	<div class="col-md-12">
				                <button class="btn btn-dark mt-3" type="submit" name="submit">Tambah Data</button>
				              </div>
		              	</div>
		              </div>
	              </form>
            </div>
     	</div>
    </section>

</body>
<script src="../js/script5.js"></script>
</html>