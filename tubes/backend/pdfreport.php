<?php

require_once "./mpdf_v8.0.3-master/vendor/autoload.php";

require 'function.php';

$produk = query("SELECT * FROM produk");



$html = '<!doctype html>

<html lang="en">
  <head>

    <title>Data Produk</title>
    <style>
    th, td {
      text-align:center;
    }
    </style>
  </head>
  <body>

        <div class="container pt-5" id="isi2">
          <h3 style="text-align:center;">Data Produk 294 Store</h3>
          <table border=1 cellpadding=10 cellspacing=0 style="margin: 2px auto;">
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
            $html .='
              <tr>
                <th scope="col">'.$i++.'</th>
                <td scope="col"><img src="../aset/img/'.$p["gambar_produk"].'" width="100px"></td>
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
$mpdf->AddPage("P","","","","","15","15","15","15","","","","","","","","","","","","A4");
$mpdf->WriteHTML($html);
$mpdf->Output();