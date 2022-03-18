<?php 
// array
// Variabel yang dapat memiliki banyak nilai
// elemen array boleh memiliki tipe data yang berbeda
// pasangan key dan value
// key nya adalah index, yang dimulai dari 0

// membuat array
// cara lama
$hari = array("Senin", "selasa", "rabu");
// cara baru
$bulan = ["januari", "februari", "maret"];
$arrl = [123, "tulisan", false];


// menampilkan array
// var_dump(), print_r()

var_dump($hari);
echo "<br>";
print_r($bulan);

// menampilkan satu elemen pada array

echo $arrl[0];
echo "<br>";
echo $bulan[1];
echo "<br>";

// menambahkan elemen baru pada array
var_dump($hari);
$hari[]="kamis"
$hari[]="jumat"
echo "<br>";
var_dump($hari);
echo "<br>";


 ?>