<?php 
$mahasiswa = [

    [
    "nama" => "Muhammad Rizki Haikal", 
    "npm" => "213040082", 
    "email" => "mrizhs294@gmail.com", 
    "jurusan" => "Teknik Informatika",
    "gambar" => "rizki.jpg"
    ],
    [
    "nama" => "Ranca Satrio Pasundan", 
    "npm" => "213040072", 
    "email" => "ranca777@gmail.com", 
    "jurusan" => "Teknik Indutri",
    "gambar" => "ranca.png"
    ],
    [
    "nama" => "Fauzan Abdul Kosim", 
    "npm" => "213040104", 
    "email" => "uzan33@gmail.com", 
    "jurusan" => "Teknologi Pangan",
    "gambar" => "uzan.png"
    ],
    [
      "nama" => "Hafiz Faiz Badrualam", 
      "npm" => "213040083", 
      "email" => "badru987@gmail.com", 
      "jurusan" => "Perencanaan Wilayah dan Kota",
      "gambar" => "hafiz.png"
    ]
      
 ];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Daftar Mahasiswa</title>
  </head>
  <body>

    <div class="container">
        <h1>Daftar Mahasiswa</h1>
        <table class="table">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php  $i=1;?>
            <?php foreach ($mahasiswa as $m) :?>
                <tr class="align-middle">
                    <th scope="row"><?= $i++ ?></th>
                    <td><img src="img/<?= $m["gambar"] ?>" width="100px" height="100px" class="rounded-circle"></td>
                    <td><?= $m["nama"] ?></td>
                    <td>
                        <a href="" class="btn badge bg-warning">Edit</a>
                        <a href="" class="btn badge bg-danger">Hapus</a>
                        <a href="kuliah_latihan_3.php?nama=<?= $m["nama"]; ?>&npm=<?= $m["npm"]; ?>&email=<?= $m["email"]; ?>&jurusan=<?= $m["jurusan"]; ?>&gambar=<?= $m["gambar"] ?> "class="btn badge bg-info">Detail</a>
                    </td>
                </tr>
            <?php endforeach?>

    </tbody>
    </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>