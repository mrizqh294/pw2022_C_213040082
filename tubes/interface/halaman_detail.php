<?php 
  session_start();

  

  if (!isset($_SESSION['loginUser'])) {
    header("location: ../index.php");
    exit;
  }

  require '../backend/function.php';

  $id = $_GET['kode_produk'];

  $userLogin = $_SESSION['userLogin'];

  $p = query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE produk.kode_produk = $id")[0];


  if (isset($_POST["keranjang"])) {


// cek apakah data berhasil di tambah atau tidak

  if (keranjang($_POST) > 0) {
    echo "
      <script>
        alert('Berhasil ditambahakan ke keranjang');
        document.location.href='../interface/keranjang.php';
      </script>
    ";
  }
  else {
    echo "
      <script>
        alert('Gagal ditambahakan ke keranjang. Periksa koneksi jaringan anda kemudian coba lagi');
        document.location.href='../interface/keranjang.php';
      </script>
    ";
  }
}


// ketika tombol beli di klik

if (isset($_POST['pesan'])) {
  
  $id_user = $_POST['id_user'];
  $id_produk = $_POST['id_produk'];
  $jumlah = $_POST['jumlah_pesan'];
  $harga = $_POST['harga_produk'];

  if ($jumlah > 0) {
    $total_bayar = $jumlah * $harga;

    $konfirmasi = [
        "id_user" => "$id_user",
        "id_produk" => "$id_produk",
        "jumlah_pesan" => "$jumlah",
        "total_bayar" => "$total_bayar"
    ];

    $_SESSION['konfirmasi'] = $konfirmasi;

    header("location: konfirmasi_pembelian.php");
     
  } else {
     echo "
          <script>
            alert('Gagal membeli produk. periksa konesi jaringan anda kemuaian coba lagi.');
            document.location.href='halaman_user.php';
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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=2">
    <link rel="stylesheet" type="text/css" href="../style/responsive.css?x=2">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



    <title><?php echo $p['nama_produk']; ?></title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-3 pb-3 position-fixed w-100 ">
      <div class="container">
        <a class="navbar-brand fw-bold"><i class="fa-solid fa-store me-2" ></i>294 Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
          <a href="../backend/ubah_profil_user.php?id=<?php echo $userLogin['id_user']; ?>" class="me-3"><?php echo $userLogin['username_user'];?></a>
          <a href="keranjang.php"><i class="fas fa-shopping-cart ms-2 me-2"></i></a>
          <a href="pesanan.php"><i class="fa-solid fa-basket-shopping ms-2 me-2"></i></i></a>
          <a href="../backend/logout.php" class="ms-2"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
      </div>
    </nav>


   <section class="w-100 pt-5 ">
     <div class="row h-100 w-100  mx-auto detail pt-5 pt-lg-0 ps-3 ps-lg-0 pe-3 pe-lg-0 pb-4 pb-lg-0  ">
       <div class="col-md-10 my-auto mx-auto border p-4 shadow-sm rounded bg-white ">
         <div class="col-md-12">
          <h3 class="fw-bold text-center"><?php echo $p['nama_produk']; ?></h3>
           <div class="row pt-3">
             <div class="col-md-6 my-auto text-center text-lg-start">
              <img src="../aset/img/<?php echo $p['gambar_produk'] ?>" width="70%">
               
             </div>
             <div class="col-md-6 my-auto">
              <div class="col-md-12 text-center text-lg-start">
                <p class="fw-bold text-justify">Detail Produk</p>
                <p><span>Nama : </span><?php echo $p['nama_produk'] ?></p>
                <p><span>Merk : </span><?php echo $p['merk_produk'] ?></p>
                <p><span>Harga : </span>Rp.<?php echo $p['harga_produk'] ?></p>
                <p><span>Kategori : </span><?php echo $p['nama_kategori'] ?></p>
                
              </div>
              <div class="col-md-12 text-center text-lg-start">
                <p class="fw-bold">Deskripsi Produk</p>
                <p><?php echo $p['desk_produk'] ?></p>
              </div>
              <div class="col-md-12 text-center text-lg-start">
                <div class="row">
                  <div class="col-md-6 text-center text-lg-start">
                    <form action="" method="POST">
                      <input type="hidden" name="kode_produk" value="<?php echo $p['kode_produk'] ?>">
                      <input type="hidden" name="id_user" value="<?php echo $userLogin['id_user'] ?>">
                      
                      <p>Jumlah : </p><input type="text" name="jumlah_p_keranjang" class="inputForm" value="1">
                      
                      <button name="keranjang" type="submit" class="btn btn-dark btn-keranjang mt-2 mb-2">Tambah Ke Troli</button>
                    </form>
                  </div>
                  <div class="col-md-6 text-center text-lg-start">
                    <form action="" method="POST">
                      <input type="hidden" name="id_produk" value="<?php echo $p['kode_produk'] ?>">
                      <input type="hidden" name="id_user" value="<?php echo $userLogin['id_user'] ?>">
                      <input type="hidden" name="harga_produk" value="<?php echo $p['harga_produk'] ?>">

                      
                      <p>Jumlah : </p><input type="text" name="jumlah_pesan" class="inputForm" value="1">
                      
                      <a href="konfirmasi_pembelian.php"><button name="pesan" type="submit" class="btn btn-dark btn-keranjang mt-2 mb-2">Beli Sekarang</button></a>
                    </form>
                  </div>
                </div>
              </div>
             </div>
           </div>
             
         </div>
       </div>
     </div>
   </section>

   <footer class="text-white pt-0 pt-lg-5 container-fluid bg-dark">
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

    <script src="js/script1.js"></script>

  </body>
</html>