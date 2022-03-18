<?php 	
// array multidimensi
// array di dalam array 

$mahasiswa = [
	["rizki", "213040082", "r@gmail.com", "teknik informatika"],
	["ranca", "213040072",[1,[2],3],"teknik informatika"]
];

echo $mahasiswa [0][1];
echo "<hr>";
echo $mahasiswa [1][2][1][0];


 ?>