<?php 
require '../backend/function.php';


$gitar = $_GET['gitar'];

//$produk = query("SELECT * FROM produk");

$query = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori  WHERE nama_kategori LIKE 'Gitar%' ";

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
            <a href="" class="more bg-dark mb-1">Detail</a>
          </div>
        </div>
      </div>
<?php endforeach; ?>  