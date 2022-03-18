<?php 
// Pertemuan 5 ARRAY 
// Array adalah variabel yg bisa menampung atau menyimpan banyak nilai sekaligus

// $hari = "senin";
// $hari = "selasa";

// $bulan1 = "januari";
// $bulan2 = "februari";


// membuat array
$hari = ["senin", "selasa", "rabu", "kamis", "jumat"]; //cara baru
$bulan = array("januari", "februari", "maret"); //cara lama
$myArr = [10, "rizki", true];

// mencetak ARRAY 
// mencetak satu elemen dalam array , menggunakan index
// index dimulai dari nol

echo $hari[0];
echo "<br>";
echo $bulan[1];
echo "<br>";
echo $myArr[0];
echo "<hr>";

// mencetak dengan var_dump() atau print_r()
// khusus debugging

var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<hr>";

// mencetak semua isi array dengan looping
// for

for ($i=0; $i < count($hari) ; $i++) { 
	echo $hari[$i];
	echo "<br>";
}
echo "<hr>";

//foreach, looping khusus array

foreach ($bulan	 as $bln) {
	echo $bln;
	echo "<br>";
}
echo "<hr>";

foreach ($bulan as $key => $value) {
	echo "key: $key - value: $value";
	echo "<br>";

}

echo "<hr>";

// memanipulasi array 
// menambah elemen baru di akhir array

$hari[1] = "kamis";
print_r($hari);

// yang bener cara nambahnya ga perlu pake index
// $hari[] = "kamis"







 ?>


