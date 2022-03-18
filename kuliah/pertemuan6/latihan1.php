<?php 
// array
// membuat array
$hari = array("senin","selasa");
$bulan = ["januari","maret"];
$arr = [100, "teks", true];
// menanpilkan array
// versi debuging
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
// menampilkan satu elemen array
echo $arr[0];
echo "<br>";




 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <style>
 	.kotak {
 		width: 30px;
 		height: 30px;
 		background-color: #bada55;
 		line-height: 30px;
 		float: left;
        margin: 10px;
        text-align: center;
 	}

 	.kotak:hover {
 		transform: rotate(360deg);
 	}

    .clear {
        clear: both;
    }
 </style>
 <body>

    <?php $angka =[1,2,3,4,5,6,7,8,9]; ?>
    <?php foreach ($angka as $a): ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach ?>
    <div class="clear"></div>
 	<?php $angka =[[1,2,3],[4,5,6],[7,8,9]]; ?>
 	<?php foreach ($angka as $a): ?>
        <?php foreach ($a as $b): ?>
            <div class="kotak"><?= $b; ?></div>
        <?php endforeach ?>
        <div class="clear"></div>
 	<?php endforeach ?>
 
 </body>
 </html>