<?php 

session_start();


if (!isset($_SESSION['loginUser'])) {
  header("location: ../index.php");
  exit;
};


require '../../backend/function.php';
//require '../backend/login.php';


$userLogin = $_SESSION['userLogin'];
$produk = query("SELECT * FROM produk WHERE id_kategori = 1 OR id_kategori = 2");


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
    <link rel="stylesheet" type="text/css" href="../../style/style.css?x=11">
    <link rel="stylesheet" type="text/css" href="../../style/responsive.css?x=11">

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
              <a class="nav-link" href="../halaman_user.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="gitar.php">Gitar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bass.php">Bass</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gear.php">Gear</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aksesoris.php">Aksesoris</a>
            </li>
          </ul>
          <a ><i class="fa-solid fa-user me-2"></i></a>
          <a href="../../backend/ubah_profil_user.php?id=<?php echo $userLogin['id_user']; ?>" class="me-3"><?php echo $userLogin['username_user'];?></a>
          <a href="../keranjang.php"><i class="fas fa-shopping-cart ms-2 me-2"></i></a>
          <a href="../pesanan.php"><i class="fa-solid fa-basket-shopping ms-2 me-2"></i></i></a>
          <a href="../../backend/logout.php" class="ms-2"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>


    

    <section class="pt-4">
      <div class="container-fluid pt-5">
        <div class="container mt-4 mb-4 ">
          <div class="row">
            <div class="col-md-6 text-start">
              <h2 class="fw-bold text-center text-lg-start">Gitar Series</h2> 
            </div>
          </div>

          <div class="col-md-12">
            <div class="row" id="isi2">
              <?php foreach ( $produk as $p): ?>
                <div class="col-6 col-md-3" >
                  <div class="card c-user p-2 shadow-sm bg-body rounded mt-4" id="card">
                    <img src="../../aset/img/<?php echo $p["gambar_produk"] ?>">
                    <div class="text-center title">
                      <p class="m-0 nama_produk"><?php echo $p["nama_produk"]; ?></p>
                      <p class="mb-3 harga" >Rp.<?php echo $p["harga_produk"]; ?></p>
                    </div>    
                    <div class="text-center action">
                      <a href="../halaman_detail.php?kode_produk=<?php echo $p["kode_produk"] ?>" class="more bg-dark mb-1">Detail</a>
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
              <a href="#about-us">Semua</a>
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

    <script src="../js/script3.js"></script>

  </body>
</html>