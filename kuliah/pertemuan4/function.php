<?php 
// fungsi harus di definisikan terlabih dahulu

function salam($waktu = "datang", $nama = "admin") {
	return "Selamat $waktu, $nama ";
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	<h1><?php echo salam("Malam"); ?></h1>
 
 </body>
 </html>