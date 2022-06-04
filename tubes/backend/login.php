<?php 


session_start();

if (isset($_SESSION['loginAdmin'])) {
  header("location: ../interface/halaman_admin.php");
} elseif (isset($_SESSION['loginUser'])) {
  header("location: ../interface/halaman_user.php");
  exit;
};


require 'function.php';

  

if (isset($_POST['submit'])){

  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $admin = mysqli_query($db,"SELECT * FROM admin WHERE username_admin = '$username' ");
  $user = mysqli_query($db,"SELECT * FROM user WHERE username_user = '$username' ");


  if (mysqli_num_rows($admin) === 1) {

    $resultAdmin = mysqli_fetch_assoc($admin);
    if (password_verify($password, $resultAdmin['password_admin_fix'])) {
      $_SESSION['loginAdmin'] = true;
      $_SESSION['adminLogin'] = $resultAdmin;
    header("location: ../interface/halaman_admin.php");
    exit;
    }    
    
  } elseif (mysqli_num_rows($user) === 1) {

    $resultUser = mysqli_fetch_assoc($user);
    if ( password_verify($password, $resultUser['password_user_fix'])) {
      $_SESSION['loginUser'] = true;
      $_SESSION['userLogin'] = $resultUser;


      header("location: ../interface/halaman_user.php");
      exit;
    }
    
  } else {
    echo "
          <script>
            alert('Username atau password yang anda masukan salah!!!');
            document.location.href='../backend/login.php';
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
        <div class="row h-100 w-100 tag-hero p-2 mx-auto">
          <div class="col-md-6 my-auto mx-auto bg-white p-5 text-center text-lg-start LoTaUb shadow-sm">
          	<div class="row">
          		<h3 class="text-center fw-bold">294 Store Login</h3>
          		<div class="col-md-6 my-auto order-1">
								<?php if (isset($login['error'])) :?>
									<p><?php echo $login['pesan'] ?></p>
								<?php endif; ?>
								<form action="" method="post">
									
									<p><label for="username">Username: </label></p>
									<input class="inputForm" type="text" name="username" id="username" autocomplete="off" placeholder="Username" required>
									<br>	
									<p><label for="password">Password: </label></p>
									<input class="inputForm" type="password" name="password" id="password" autocomplete="off" placeholder="Password" required>
									<br>
									<button class="btn btn-dark mt-3" type="submit" name="submit">login</button>
								</form>
								<p class="pt-2 pt-md-4">Belum memiliki akun? <a href="registrasi.php" class="fw-bold text-dark">Regitrasi</a></p>
          		</div>
          		<div class="col-md-6 my-auto order-md-2">
		            <img src="../aset/img/ampli1.jpg" class="end-0 img-hero w-100">
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