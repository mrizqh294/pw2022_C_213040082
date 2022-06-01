<?php   

session_start();

if (!isset($_SESSION['loginAdmin'])) {
  header("location: ../index.php");
  exit;
}

require '../backend/function.php';


$adminLogin = $_SESSION['adminLogin'];


$pending = query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.status_transaksi = 'pending' ");

$selesai = query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.status_transaksi = 'selesai' ");

$empty = mysqli_query($db,"SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk");


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
    <link rel="stylesheet" type="text/css" href="../style/responsive.css?x=6">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <title>Pesanan Pelanggan </title>
  </head>
  <body>

    <!-- ini navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 w-100 position-fixed">
      <div class="container">
        <a class="navbar-brand fw-bold"><i class="fa-solid fa-store me-2" ></i>294 Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="halaman_admin.php">Kembali</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#1">Pending</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#2">Selesai</a>
            </li>
          </ul>
          <a ><i class="fa-solid fa-user me-2"></i></a>
          <a href="" class="me-2"><?php echo $adminLogin['username_admin'];?></a>
          <a href="../backend/logout.php"><i class="ms-2 fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>

    <!-- akhir navbar -->

    <!-- ini isi -->

    <section id="1">
      <div class="container-fluid pt-5">
        <div class="container mt-4 mb-4 pt-4">
          <h4 class="fw-bold text-center text-lg-start">Belum diproses</h4>
          <div class="col-md-12 w-100">
            <div class="row " id="isi1">

              <?php foreach ( $pending as $k): ?>

                <div class="col-6 col-md-3">
                  <div class="card c-admin p-2 pb-0 shadow-sm bg-body rounded mt-4">
                    <img src="../aset/img/<?php echo $k["gambar_produk"] ?>" width="100%">
                    <div class="text-center title">
                      <p class="m-0 nama_produk card-title"><?php echo $k["nama_produk"]; ?></p>
                      <p class="m-0" style=" font-size: 12px;"><?php echo $k["username_user"]; ?></p>
                      <p>Status : <span style="font-style: italic ;"><?php echo $k['status_transaksi'] ?></span></p>
                    </div>    
                    <div class="text-center action mb-3">
                      <a href="detail_pesanan_admin.php?kode_produk=<?php echo $k['kode_produk'] ?>&id_user=<?php echo $k['id_user'] ?>" class="bg-dark more">Detail</a>
                    </div>
                  </div>
                </div>
                
              <?php endforeach; ?>  
            </div> 
          </div>
        </div>
      </div>
    </section>

    <section id="2">
      <div class="container-fluid ">
        <div class="container mt-4 mb-4 pt-3">
          <h4 class="fw-bold text-center text-lg-start">Sudah diproses</h4>
          <div class="col-md-12 w-100">
            <div class="row " id="isi1">

              <?php foreach ( $selesai as $s): ?>

                <div class="col-6 col-md-3">
                  <div class="card c-admin p-2 pb-0 shadow-sm bg-body rounded mt-4">
                    <img src="../aset/img/<?php echo $s["gambar_produk"] ?>">
                    <div class="text-center title">
                      <p class="m-0 nama_produk"><?php echo $s["nama_produk"]; ?></p>
                      <p class="m-0" style=" font-size: 12px;"><?php echo $s["username_user"]; ?></p>
                      <p>Status : <span style="font-style: italic ;"><?php echo $s['status_transaksi'] ?></span></p>
                    </div>    
                    <div class="text-center action mb-3">
                      <a href="detail_pesanan_admin.php?kode_produk=<?php echo $s['kode_produk'] ?>&id_user=<?php echo $s['id_user'] ?>" class="bg-dark more">Detail</a>
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

    <script src="../js/script2.js"></script>
  </body>
</html>