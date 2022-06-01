<?php 
require '../backend/function.php';

session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}

$admin = query("SELECT * FROM admin");
$adminLogin = $_SESSION['adminLogin'];

// ketika tombol cari di klik
 if(isset($_POST['cari'])){
  $produk = cari($_POST['keyword']);
 }

$countPro = query("SELECT COUNT(*) FROM produk");
$countUser = query("SELECT COUNT(*) FROM user");
$countOrder = query("SELECT COUNT(*) FROM transaksi");
$countAdmin = query("SELECT COUNT(*) FROM admin");




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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=56">
    <link rel="stylesheet" type="text/css" href="../style/responsive.css?x=4">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <title> Halaman Admin 294 Store Official</title>
  </head>
  <body>

    <!-- ini navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 w-100 position-fixed">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-store me-2" ></i>294 Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="halaman_admin.php">Kembali</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../backend/tambah_produk.php">Tambah Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../backend/tambah_admin.php">Tambah Admin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesanan_admin.php">Pesanan</a>
            </li>
          </ul>
          <a ><i class="fa-solid fa-user me-2"></i></a>
          <a href="#" class="me-3"><?php echo $adminLogin['username_admin'];?></a>
          <a href="../backend/logout.php" class="ms-3"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>

    <!-- akhir navbar -->

    <!-- ini isi -->

    <section class="pt-5">
      <div class="container pt-5 w-100" id="isi3">
        <h3 class="fw-bold ms-5 ps-4">Data Admin</h3>
          <table class="table-bordered mx-auto" cellpadding="10"  >
            <thead>
              <tr class="align-middle p2">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
              </tr>
            </thead>
            <tbody>
                <?php  $i=1;?>
                <?php foreach ($admin as $a) :?>
                <tr class="align-middle p-2">
                  <th scope="col"><?php echo $i++ ?></th>
                  <td scope="col"><?php echo $a['nama_admin'] ?></td>
                  <td scope="col"><?php echo $a['username_admin'] ?></td>
                  <td scope="col"><?php echo $a['password_admin_fix'] ?></td>
                </tr>
                                    
                <?php endforeach?>
            </tbody>
          </table>
      </div>
    </section>

    <!-- akhir isi -->
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <script src="../js/script2.js"></script>
  </body>
</html>