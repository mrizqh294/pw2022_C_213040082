<?php 
require '../backend/function.php';


$keyword = $_GET['keyword2'];

//$produk = query("SELECT * FROM produk");

$query = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori  WHERE nama_produk LIKE '%$keyword%' OR harga_produk LIKE '%$keyword%' or merk_produk LIKE '%$keyword%' OR nama_kategori LIKE '%$keyword%'   ";

$produk = query($query);

 ?>

 <?php foreach ( $produk as $p): ?>
     <div class="col-6 col-md-3" >
        <div class="card c-user p-2 shadow-sm bg-body rounded mt-4">
          <img src="../aset/img/<?php echo $p["gambar_produk"] ?>">
          <div class="text-center title">
            <p class="m-0 nama_produk"><?php echo $p["nama_produk"]; ?></p>
            <p class="mb-3 harga" >Rp.<?php echo $p["harga_produk"]; ?></p>
          </div>    
          <div class="text-center action">
            <a href="../interface/halaman_detail.php?kode_produk=<?php echo $p["kode_produk"] ?>" class="more bg-dark mb-1">Detail</a>
          </div>
        </div>
      </div>
<?php endforeach; ?>  