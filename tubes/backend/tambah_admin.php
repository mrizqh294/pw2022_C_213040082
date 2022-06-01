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
	if (tambah_admin($_POST) > 0) {
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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=8">
    <link rel="stylesheet" type="text/css" href="responsive.css?x=8">

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
            <div class="col-md-6 p-5 my-auto mx-auto bg-white LoTaUb shadow-sm">
	            <form  action="" method="post">
	              <div class="col-md-12">
	                <h3 class="text-center fw-bold">Tambah Data Admin</h3>
	                <hr class="text-center">
	              </div>
	              <div class="col-md-12">
	                <p class="text-center mt-3">Nama:</p>
	                <input autocomplete="off" class="inputForm" type="text" name="nama_admin" placeholder="Nama" required>
	              </div>
	              <div class="col-md-12">
	                <p class="text-center mt-1">Username:</p>
	                <input autocomplete="off" class="inputForm" type="text" name="username_admin" placeholder="Username" required>
	              </div>
	              <div class="col-md-12">
	                <p class="text-center mt-1 ">Password :</p>
	                <input autocomplete="off" class="inputForm" type="password" name="password1" placeholder="Password" required>
	              </div>
	              <div class="col-md-12">
	                <p class="text-center mt-1 ">Konfirmasi Password:</p>
	                <input autocomplete="off" class="inputForm" type="password" name="password2" placeholder="Konfirmasi Password" required>
	              </div>
	              <div class="col-md-12 pt-2">
	                <button class="btn btn-dark" type="submit" name="submit">Tambah Data</button>
	              </div>
	            </form>
            </div>
     	</div>
    </section>

</body>
</html>