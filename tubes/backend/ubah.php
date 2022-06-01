<?php 
//koneki ke database

session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}

require 'function.php';

$id= $_GET["kode_produk"];

$p = query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE produk.kode_produk = $id")[0];



//cek apakah tombol tombol submit sudah di tekan atau belum
if (isset($_POST["submit"])) {

// cek apakah data berhasil di ubah atau tidak
	if (ubah($_POST) > 0) {
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href='../interface/halaman_admin.php';
			</script>
		";
	}
	else {
		echo "
			<script>
				alert('Data gagal diubah');
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
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">


    <title> Halaman Admin 294 Store Official</title>
  </head>
  <body>

	<section class="w-100">
    <div class="container-fluid bg-light">
    	<div class="row text-center w-100 bg-light p-2 mx-auto tambah_data">
            <div class="col-md-8 p-5 LoTaUb my-auto mx-auto bg-white shadow-sm">
	            <div class="row">
	            	<div class="col-md-12">
				          <h3 class="text-center fw-bold">Ubah Data Produk</h3>
				          <hr class="text-center">
				        </div>
	            	<div class="col-md-12">
	            		<form form  action="" method="post" enctype="multipart/form-data">
	            			<input type="hidden" name="kode_produk" value="<?php echo $p["kode_produk"] ?>">
					          <input type="hidden" name="gambar_lama" value="<?php echo $p["gambar_produk"] ?>">
	            			<div class="row">
		            			<div class="col-md-4">
					              <div class="col-md-12">
					                <p class="text-center mt-1">Nama Produk :</p>
					                <input autocomplete="off" class="inputForm" type="text" name="nama_produk" value="<?php echo $p['nama_produk'] ?>">
					              </div>
					              <div class="col-md-12">
					                <p class="text-center mt-1">Merk Produk:</p>
					                <input autocomplete="off" class="inputForm" type="text" name="merk_produk" value="<?php echo $p['merk_produk'] ?>">
					              </div>
					              <div class="col-md-12">
					                <p class="text-center pt-2 ">Kategori</p>
					                <select name="id_kategori" class="inputForm" >
					                	<option value="<?php echo $p['id_kategori'] ?>"><?php echo $p['nama_kategori'] ?></option>
					                	<option value="1">Gitar Akustik</option>
					                	<option value="2">Gitar Elektrik</option>
					                	<option value="3">Bass</option>
					                	<option value="4">Gear</option>
					                	<option value="5">Aksesoris</option>
					                </select>
					              </div>
		            			</div>
		            			<div class="col-md-4">
		            				<div class="col-md-12 my-auto order-md-2">
		            					<p class="fw-bold">Preview Gambar Lama :</p>
						            	<img src="../aset/img/<?php echo $p['gambar_produk'] ?>" width="70%">
						            </div>
		            			</div>
		            			<div class="col-md-4">
		            				<div class="col-md-12">
					                <p class="text-center mt-1 ">Harga Produk:</p>
					                <input autocomplete="off" class="inputForm" type="text" name="harga_produk" value="<?php echo $p['harga_produk'] ?>">
					              </div>
					              <div class="col-md-12">
					                <p class="text-center mt-1">Gambar Produk:</p>
					                <input autocomplete="off" class="inputForm ms-3 form-control" type="file" name="gambar_produk">
					              </div>
					              <div class="col-md-12">
					                <p class="text-center mt-1 ">Deskripsi Produk:</p>
					                <textarea autocomplete="off" class="inputForm" name="desk_produk"><?php echo $p['desk_produk'] ?></textarea>
					              </div>
		            			</div>
		            			<div class="col-md-12 pt-2">
					              <button class="btn btn-dark pt-2" type="submit" name="submit">Ubah Data</button>
					            </div>	
		            		</div>
	            		</form> 		
	            	</div>
	            </div>
            </div>
     	</div>
    </div>	
  </section>
</body>
</html>