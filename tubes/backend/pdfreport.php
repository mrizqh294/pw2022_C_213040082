<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';

$produk = query("SELECT * FROM produk");



$html = '<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- my style -->
    <link rel="stylesheet" type="text/css" href="../style/style.css?x=20">
    <link rel="stylesheet" type="text/css" href="../style/responsive.css?x=20">

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- style ikon -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">



    <title>Detail Pesanan</title>
  </head>
  <body>
        <div class="container pt-5" id="isi2">
          <table class="table-bordered">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Merk</th>
                <th scope="col">Harga</th>
              </tr>
            </thead>
            <tbody>';

          $i= 1;
          foreach ($produk as $p) {
            $html .= '
              <tr>
                <th scope="col">'.$i++.'</th>
                <td scope="col"><img src="asset/img/'.$p["gambar_produk"].'" width="100px"></td>
                <td scope="col">'.$p["nama_produk"].'</td>
                <td scope="col">'.$p["merk_produk"].'</td>
                <td scope="col">'.$p["harga_produk"].'</td> 
              </tr>
           ';
          }

$html .=   '</tbody>
          </table>
        </div>
  </body>
  </html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();