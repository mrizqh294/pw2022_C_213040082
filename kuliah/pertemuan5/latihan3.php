<?php 
$mahasiswa = [
	["Rizki", "213040082", "Teknik Informatika", "email"], 
	["ranca", "213040072","teknik informatika", "email"]
];
?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Data Mahasiswa</title>
 </head>
 <body>

 	<h1>Daftar Mahasiswa</h1>
 	<?php foreach ($mahasiswa as $mhs) :?>
 	<ul>
 			<li>Nama : <?= $mhs[0]; ?></li>
 			<li>NRP : <?= $mhs[1]; ?></li>
 			<li>Jurusan : <?= $mhs[2]; ?></li>
 			<li>Email : <?= $mhs[3]; ?></li>
 	</ul>
 	<?php endforeach;?>

 	<br>


 
 </body>
 </html>