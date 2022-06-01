<?php 

session_start();

if (!isset($_SESSION['loginUser'])) {
  header("location: ../index.php");
  exit;
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
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=7">
    <link rel="stylesheet" type="text/css" href="responsive.css?x=7">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

    <title>Login</title>
  </head>
  <body>
  	<section id="login">
      <div class="container-fluid bg-light w-100" id="home">
        <div class="container">
          <div class="row h-100 w-100 tag-hero p-2 mx-auto">
            <div class="col-md-6 my-auto mx-auto bg-white p-5 text-center text-lg-start LoTaUb w-100 shadow-sm">
              <div class="row text-center w-100 mx-auto">
                <h5 class="text-center fw-bold">Tranfer Ke :</h5>
                <p class="pt-2"><span class="fw-bold">BRI   : </span>321456789123</p>
                <p><span class="fw-bold">BNI   : </span>321456789098</p>
                <p><span class="fw-bold">BCA   : </span>432145675466</p>
                <p><span class="fw-bold">DANA  : </span>08834678023</p>
                <p><span class="fw-bold" class="fw-bold">OVO   : </span>08927223368</p>
                <p><span class="fw-bold">GOPAY : </span>08278232213</p>
                <div class="col-md-6 mx-auto">
                  <a href="halaman_user.php" class="more bg-dark">Kembali Ke Home</a>
                </div>      
              </div>
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