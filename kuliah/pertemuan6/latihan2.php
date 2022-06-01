<?php 
// $mahasiswa = [
// 	["Rizki","213040082","IF","mrizhs294"],
// 	["Ranca","213040072","IF","gigih"]
// ];

// array asosiatif
// definisinya sama dengan array numerik kecuali
// stringnya buatan kita sendiri
$mahasiswa = [
	[
	"Nama" => "Rizki",
	"NRP"  => "213040082",
	"jurusan" => "IF",
	"Email"  => "rizh",
	"gambar" => "h"
	],
	[
	"Nama" => "Ranca",
	"NRP"  => "213040072",
	"jurusan" => "IF",
	"Email"  => "gigih"
	]
];
echo $mahasiswa[0]["NRP"];
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data mahasiswa</title>
</head>
<body>
	<h1>Daftar mahasiswa</h1>
	<?php foreach ($mahasiswa as $mhs): ?>
		<ul>
			<li><?php echo $mhs["Nama"];?></li>
			<li><?php echo $mhs["NRP"];?></li>
			<li><?php echo $mhs["jurusan"];?></li>
			<li><?php echo $mhs["Email"];?></li>
		</ul>
	<?php endforeach ?>
</body>
</html>