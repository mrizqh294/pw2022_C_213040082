<?php 
require 'backend/function.php';



$produk = query("SELECT * FROM produk");


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
    <link rel="stylesheet" type="text/css" href="style/style.css?x=70">
    <link rel="stylesheet" type="text/css" href="style/responsive.css?x=0">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



    <title> Welcome To 294 Store Official</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 position-fixed w-100">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#"><i class="fa-solid fa-store me-2" ></i>294 Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Beranda</a>
            </li>
          </ul>
          <a href="backend/login.php" class="me-2">Login</a>
          <a href="backend/login.php" class="ms-3"><i class="fa fa-sign-in"></i></a>
        </div>
      </div>
    </nav>


    <section class="w-100 pt-5">
        <div class="container-fluid w-100 pt-5 top-section">
          <div class="row w-100 pt-3 mx-auto">
            <di class="col-md-8 mx-auto">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="aset/img/banner.jpg" class="d-block w-100 h-30" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Shop Now!!!</h5>
                    <p>Selamat datang di tokonya para sultan</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="aset/img/banner1.jpg" class="d-block w-100 h-30" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Good design</h5>
                    <p>Design produk yang begitu elegan</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="aset/img/banner2.jpg" class="d-block w-100 h-30" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Many Choice</h5>
                    <p>Tersedia banyak pilihan produk yang tentunya berkualitas internasional</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            </di>
          </div>
          <div class="row">
            <h5 class="text-center pt-4 fw-bold">Best seller Brand</h5>
            <div class="col-md-18 text-center pt-3">
              <img src="aset/img/logobrand1.jpg" width="20%">
              <img src="aset/img/logobrand2.jpg" width="20%">
              <img src="aset/img/logobrand3.jpg" width="20%">
              <img src="aset/img/logobrand4.jpg" width="20%">
            </div>
          </div>
        </div>
    </section>

    <section>
      <div class="container-fluid">
        <div class="container mt-4 mb-4 ">
          <div class="row">
            <div class="col-md-6">
              <h2 class="fw-bold text-center text-lg-start">Semua Produk</h2>
            </div>
            <div class="col-md-6">
              <form class="d-flex" action="" method="POST">
                <input class="form-control me-2" type="search" placeholder="Cari Produk" aria-label="Search" name="keyword" autocomplete="off" id="keyword">
              </form>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row" id="isi">
              <?php foreach ( $produk as $p): ?>
                <div class=" col-6 col-md-3" >
                  <div class="card c-user p-2 shadow-sm bg-body rounded mt-4" id="card">
                    <img src="aset/img/<?php echo $p["gambar_produk"] ?>">
                    <div class="text-center title">
                      <p class="m-0 nama_produk"><?php echo $p["nama_produk"]; ?></p>
                      <p class="mb-3 harga" >Rp.<?php echo $p["harga_produk"]; ?></p>
                    </div>    
                    <div class="text-center action">
                      <a href="backend/login.php" class="more bg-dark mb-1" name="detail" onclick="return confirm('login terlebih dahulu untuk melihat detail produk')";>Detail</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>  
            </div>
            
          </div>
        </div>
      </div>
    </section>

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
              <i class="fa fa-home mr-3"></i>Washington DC, Subang.
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

    <script src="js/script1.js"></script>
    <script src="js/script4.js" ></script>

  </body>
</html>