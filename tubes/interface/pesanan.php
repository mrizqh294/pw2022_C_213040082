<?php   

session_start();

if (!isset($_SESSION['loginUser'])) {
  header("location: ../index.php");
  exit;
}

require '../backend/function.php';


$userLogin = $_SESSION['userLogin'];

$id = $userLogin['id_user'];

$t = query("SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.id_user = $id ");

$empty = mysqli_query($db,"SELECT * FROM transaksi JOIN user ON transaksi.id_user = user.id_user JOIN produk ON transaksi.id_produk = produk.kode_produk WHERE transaksi.id_user = $id ");


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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=90">
    <link rel="stylesheet" type="text/css" href="../style/responsive.css?x=6">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <title>Pesanan <?php echo $userLogin['nama_user'];?> </title>
  </head>
  <body>

    <!-- ini navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 w-100 position-fixed">
      <div class="container">
        <a class="navbar-brand fw-bold" ><i class="fa-solid fa-store me-2" ></i>294 Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="halaman_user.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="sortingUser/gitar.php">Gitar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sortingUser/bass.php">Bass</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sortingUser/gear.php">Gear</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sortingUser/aksesoris.php">Aksesoris</a>
            </li>
          </ul>
          <a ><i class="fa-solid fa-user me-2"></i></a>
          <a href="../backend/ubah_profil_user.php?id=<?php echo $userLogin['id_user']; ?>" class="me-2"><?php echo $userLogin['username_user'];?></a>
          <a href="keranjang.php"><i class="fas fa-shopping-cart ms-2 me-2"></i></a>
          <a href="../backend/logout.php"><i class="ms-2 fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>

    <!-- akhir navbar -->

    <!-- ini isi -->

    <section>
      <div class="container-fluid pt-5">
        <div class="container mt-4 mb-4 pt-4">
          <h3 class="fw-bold">Pesanan Anda</h3>
          <div class="col-md-12 w-100">
            <div class="row " id="isi1">

              <!-- jika keranjang kosong maka jalankan kode ini -->

              <?php if (mysqli_num_rows($empty) === 0): ?>
                  <div class="row h-100 w-100 mx-auto" style=" min-height: 50vh ;">
                    <div class="col-md-12 mx-auto my-auto text-center">
                      <h4>Anda belum memesan produk apapun.</h4>
                    </div>
                  </div>
              <?php endif ?>



              <?php foreach ( $t as $k): ?>

                <div class="col-6 col-md-3">
                  <div class="card c-admin p-2 pb-0 shadow-sm bg-body rounded mt-4">
                    <img src="../aset/img/<?php echo $k["gambar_produk"] ?>" width="100%">
                    <div class="text-center title">
                      <p class="m-0 nama_produk"><?php echo $k["nama_produk"]; ?></p>
                      <p>Status : <span style="font-style: italic ;"><?php echo $k['status_transaksi'] ?></span></p>
                    </div>    
                    <div class="text-center action mb-3">
                      <a href="detail_pesanan_user.php?kode_produk=<?php echo $k['kode_produk'];?>&id_transaksi=<?php echo $k['id_transaksi'] ?>" class="bg-dark more">Detail</a>
                      <?php if ( $k['status_transaksi'] === 'pending'): ?>
                        <a href="pembayaran.php" class="bg-dark more mt-2">Bayar</a>
                      <?php endif ?>
                      <?php if ( $k['status_transaksi'] === 'selesai' ): ?>
                        <a class="bg-dark more mt-2">Unduh Bukti</a>
                      <?php endif ?>
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

    <footer class="text-white pt-5 container-fluid bg-dark">
      <div class="container">
        <div class="row ">
          <div class="col-md-3 col-lg3 col-xl3 mx-auto mt-3">
            <h5 class="fw-bold">294 Store</h5>
            <p>294 Store merupakan salah satu toko alat musik terbesar di dunia. Oleh karena itu kami selalu menjual produk yang berkualitas dan tentunya original. Kepuasan pelanggan adalah tanggung jawab kami. </p>
          </div>

          <div class="col-md-2 col-lg2 col-xl2 mx-auto mt-3">
            <h5 class="fw-bold">Menu</h5>
            <p>
              <a href="#home">Home</a>
            </p>
            <p>
              <a href="#about-us">All Produk</a>
            </p>
            <p>
              <a href="#visi-misi">Gitar</a>
            </p>
            <p>
              <a href="#services">Bass</a>
            </p>
            <p>
              <a href="#contact">Gear</a>
            </p>
            <p>
              <a href="#contact">Aksesoris</a>
            </p>
          </div>

          <div class="col-md-3 col-lg2 col-xl2 mx-auto mt-3">
            <h5 class="fw-bold">Kontak</h5>
            <p>
              <i class="fa fa-home mr-3"></i> Washington DC, Subang.
            </p>
            <p>
              <i class="fa fa-envelope mr-3"></i> 294storeidn@gmail.com
            </p>
            <p>
              <i class="fa fa-phone mr-3"></i> 0888-8323-9996
            </p>

          </div>

           <div class="col-md-3 col-lg2 col-xl2 mx-auto mt-3">
            <div class="text-center text-md-right">
              <ul class="list-unstyled list-inline me-0">
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                </li>
              </ul>
            </div>
           </div>
        </div>
        
        <div class="row text-center">
          <div class="col-md-12 mt-4">
              <p class="copyright">Copyright &copy;2022 by Muhammad Rizki Haikal</p>
          </div>
          
        </div>
      </div>
    </footer>
    

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