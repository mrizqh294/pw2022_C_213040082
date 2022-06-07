<?php 
require '../../backend/function.php';

session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}

$produk = query("SELECT * FROM produk WHERE id_kategori = 5");
$adminLogin = $_SESSION['adminLogin'];

// ketika tombol cari di klik
 if(isset($_POST['cari'])){
  $produk = cari($_POST['keyword']);
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
    <link rel="stylesheet" type="text/css" href="../../style/style.css?x=51">
    <link rel="stylesheet" type="text/css" href="../../style/responsive.css?x=41">

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
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Aksesoris
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                <li><a class="dropdown-item" href="../halaman_admin.php" style="color: black !important;">Dashboard</a></li>
                <li><a class="dropdown-item" href="gitar.php" style="color: black !important;">Gitar</a></li>
                <li><a class="dropdown-item" href="bass.php" style="color: black !important;">Bass</a></li>
                <li><a class="dropdown-item" href="gear.php" style="color: black !important;">Gear</a></li>
                <li><a class="dropdown-item" href="aksesoris.php" style="color: black !important;">Aksesoris</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pesanan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" >
                <li><a class="dropdown-item" href="../pesanan_pending.php" style="color: black !important;">Pending</a></li>
                <li><a class="dropdown-item" href="../pesanan_dibayar.php" style="color: black !important;">Dibayar</a></li>
                <li><a class="dropdown-item" href="../pesanan_selesai.php" style="color: black !important;">Selesai</a></li>                
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../backend/tambah_produk.php">Tambah Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../backend/tambah_admin.php">Tambah Admin</a>
            </li>
          </ul>
          <!-- <form class="d-flex" action="" method="POST">
            <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" name="keyword" autocomplete="off" id="keyword1">
          </form> -->
          <a ><i class="fa-solid fa-user me-2"></i></a>
          <a href="#" class="me-3"><?php echo $adminLogin['username_admin'];?></a>
          <a href="../../backend/logout.php" class="ms-3"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>

    <!-- akhir navbar -->

    <!-- ini isi -->

    <section>
      <div class="container-fluid pt-5">
        <div class="container mt-4 mb-4 pt-4 w-100">
          <div class="row">
            <div class="col-md-6 text-center text-lg-start">
              <h2 class="fw-bold text-center text-lg-start">Aksesoris</h2>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row" id="isi1">
              <?php foreach ( $produk as $p): ?>
                <div class="col-6 col-md-3">
                  <div class="card c-admin p-2 shadow-sm bg-body rounded mt-4">
                    <img src="../../aset/img/<?php echo $p["gambar_produk"] ?>" width="100%">
                    <div class="text-center title">
                      <p class="m-0 nama_produk card-title"><?php echo $p["nama_produk"]; ?></p>
                      <p class="m-0" style=" font-size: 12px;">Rp.<?php echo $p["harga_produk"]; ?></p>
                    </div>    
                    <div class="text-center action">
                      <a href="../../backend/ubah.php?kode_produk=<?php echo $p["kode_produk"] ?>" class="m-2 crud bg-dark" style="font-size: 13px;">Ubah</a>
                      <a href="../../backend/hapus.php?kode_produk=<?php echo $p["kode_produk"] ?>" class="m-2 crud bg-dark" style="font-size: 13px;" onclick="return confirm('Apakah anda yakin ingin mengahapus data ini?');">Hapus</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>  
            </div> 
          </div>
        </div>
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

    <script src="../../js/script2.js"></script>
  </body>
</html>
