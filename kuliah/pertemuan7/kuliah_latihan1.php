<?php 
// super globals
// variabel milik php yang bisa kita gunakan
// bentuknya array asosiatif
// $_GET
// $_POST
// $_SERVER
// var_dump($_GET);
// var_dump($_SERVER["SERVER_NAME"]);
// var_dump($_POST)



if (isset(	$_GET ["nama"])) {
	$nama = $_GET["nama"];	
} else {
	$nama = "tidak diketahui";
};


 ?>
 <h1>Halo, <?php echo "$nama";?><h1>
 <ul>
 		<li><a href="kuliah_latihan1.php?nama=ranca">ranca</a></li>	
 		<li><a href="?nama=aing">aing</a></li>
 </ul>