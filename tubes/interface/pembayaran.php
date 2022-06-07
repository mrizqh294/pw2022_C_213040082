<?php 

require '../backend/function.php';

$id = $_GET['id_transaksi'];

$t = query("SELECT * FROM transaksi JOIN user ON transaksi.id_user=user.id_user WHERE id_transaksi = $id")[0];

session_start();

if (!isset($_SESSION['loginUser'])) {
  header("location: ../index.php");
  exit;
};

if (isset($_POST['submit'])){
  if (bayar($_POST) > 0) {

    echo "
      <script>
        alert('pembayaran berhasil, admin sedang memproses pesanan anda. Tunggu beberapa saat hingga status pesanan anda menjadi selesai');
        document.location.href='pesanan.php';
      </script>
    ";
  }
  else {
    echo "
      <script>
        alert('pembayaran gagal');
        document.location.href='pesanan.php';
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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=46">
    <link rel="stylesheet" type="text/css" href="responsive.css?x=7">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <title>Pembayaran</title>
  </head>
  <body>
  	<section>
     <div class="container-fluid">
       <div class="container w-100">
         <div class="row w-100 h-100 detail mx-auto">
            
           <div class="col-md-6  bg-white shadow-sm border text-center mx-auto my-auto LoTaUb">
              <h3 class="fw-bold pt-4">Pembayaran</h3>
              <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $t['id_transaksi'] ?>">
                <div class="input-group flex-nowrap pt-4 ps-5 pe-5">
                  <span class="input-group-text" id="addon-wrapping">Nama</span>
                  <input type="text" class="form-control"  aria-label="Username" aria-describedby="addon-wrapping" autocomplete="off" name="nama" value="<?php echo $t['nama_user'] ?>" readonly>
                </div>
                <div class="input-group flex-nowrap pt-4 ps-5 pe-5">
                  <span class="input-group-text" id="addon-wrapping">Tagihan</span>
                  <input type="text" class="form-control"  aria-label="Username" aria-describedby="addon-wrapping" autocomplete="off" name="jumlah" value="<?php echo  $t['jumlah_transaksi'] ?>" readonly>
                </div>
                <div class="input-group flex-nowrap pt-4 ps-5 pe-5 pb-4">
                  <span class="input-group-text" id="addon-wrapping">Bukti Bayar</span>
                  <input type="file" class="form-control"  aria-label="Username" aria-describedby="addon-wrapping" autocomplete="off" name="gambar_produk" required>
                </div>
                
                <div class="ps-5 pe-5 pb-5"><button class="btn btn-dark login form-control " name="submit" type="submit">Konfirmasi</button></div> 
               

              </form>
           </div>
         </div>
       </div>
     </div> 
    </section>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>