<?php
$pemain = [
	["nama" => "Cristiano Ronaldo",
	 "usia" => "37 Tahun",
	 "asal" => "Portugal",
	 "nomor" => "07",
	 "posisi" => "penyerang",
	 "foto" => "ronaldo.jpeg"
	],
	["nama" => "David de Gea",
	 "usia" => "31 Tahun",
	 "asal" => "Spanyol",
	 "nomor" => "01",
	 "posisi" => "Penjaga Gawang",
	 "foto" => "david.jpeg"
	]
]
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pemain Manchaster United</title>
</head>
<style>
	li {
		list-style: none;
		font-size: 21px;
	}
	div {
		float: left;
	}
	h1 {
		margin-left: 40px;
	}
</style>
<body>
	<h1>Data Pemain Manchaester United Tahun 2022</h1>
	<?php foreach ($pemain as $p): ?>
		<div>
			<ul>
			<li><img src="img/<?= $p["foto"] ?>" class="img"></li>
			<li>Nama : <?= $p["nama"] ?></li>
			<li>Usia : <?= $p["usia"] ?></li>
			<li>Asal : <?= $p["asal"] ?></li>
			<li>Nomor : <?= $p["nomor"] ?></li>
			<li>Posisi : <?= $p["posisi"] ?></li>
		</ul>
		</div>
	<?php endforeach ?>



</body>
</html>