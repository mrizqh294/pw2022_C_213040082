<?php 

//koneksi ke data base
$db = mysqli_connect("localhost","root","","tubes_pw_213040082_toko_online");
//$db = mysqli_connect("localhost","id18045332_294storeoff","a!qoA]]4eMCpr$!F","id18045332_294store");




//fungsi untuk query data
function query ($query){
	global $db;
	$result = mysqli_query ($db,$query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}


//fungsi untuk tambah data 
function tambah ($data_produk) {

	global $db;

	$nama_produk = htmlspecialchars($data_produk["nama_produk"]) ;
	$merk_produk = htmlspecialchars($data_produk["merk_produk"]);
	$harga_produk = htmlspecialchars($data_produk["harga_produk"]);
	$id_kategori =	htmlspecialchars($data_produk["id_kategori"]);
	$desk_produk =	htmlspecialchars($data_produk["desk_produk"]);
	
	// jalankan fungsi uplod gambar

	if ($_FILES['gambar_produk']['error']===4) {
		$gambar_produk = 'noimage.jpg';
	} else {
		$gambar_produk = upload();
		if (!$gambar_produk) {
		return false;
		}
	}

	$query = "INSERT INTO produk VALUES (NULL,'$id_kategori','$nama_produk','$merk_produk','$harga_produk', '$desk_produk','$gambar_produk'  )";
	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows ($db);
}

// fungsi untuk upload gambar

function upload() {

	$namaFile = $_FILES['gambar_produk']['name'];
	$sizeFile = $_FILES['gambar_produk']['size'];
	$error = $_FILES['gambar_produk']['error'];
	$tmpName = $_FILES['gambar_produk']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload

	if ( $error === 4) {
		echo "
			<script>
				alert('Pilih gambar terlebuh dahulu');
			</script>
		";
		return false;
	}

	// cek apakah yang di upload adalah gambar

	$ekstensi = ['jpg', 'png', 'jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if (!in_array($ekstensiGambar, $ekstensi)) {
		echo "
			<script>
				alert('Pastikan yang anda upload adalah file gambar');
			</script>
		";
	}

	// cek jika gambar ukuran nya terlalu besar

	if ($sizeFile > 1000000) {
		echo "
			<script>
				alert('Ukuran gambar yang anda upload terlalu besar');
			</script>
		";
	}

	// lolos pengecekan
	// generate nama gambar baru

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, '../aset/img/'.$namaFileBaru);
	return $namaFileBaru;

}



//fungsi untuk menghapus data

function hapus ($id){
	global $db;


	$produk = query("SELECT * FROM produk WHERE kode_produk = $id")[0];

	if ($produk['gambar_produk'] !=='noimage.jpg') {
		unlink('../aset/img/'.$produk['gambar_produk']);
	}

	mysqli_query ($db,"DELETE FROM produk WHERE kode_produk = $id");

	return mysqli_affected_rows ($db);
}



// ubah data produk

function ubah ($ubah_data) {
	global $db;

	$kode_produk = $ubah_data["kode_produk"];
	$nama_produk = htmlspecialchars($ubah_data["nama_produk"]) ;
	$merk_produk = htmlspecialchars($ubah_data["merk_produk"]);
	$harga_produk = htmlspecialchars($ubah_data["harga_produk"]);
	$id_kategori =	htmlspecialchars($ubah_data["id_kategori"]);
	$desk_produk =	htmlspecialchars($ubah_data["desk_produk"]);
	$gambar_lama = $ubah_data["gambar_lama"];

	// cek apakah user memlimilih gambar baru atau tidak

	if ($_FILES['gambar_produk']['error'] ===4 ) {
		$gambar_produk = $gambar_lama;
	} else {
		$gambar_produk = upload();
	}

	// $gambar_produk = htmlspecialchars($ubah_data["gambar_produk"]);


	$query = "UPDATE produk SET 

				id_kategori = '$id_kategori',
				kode_produk = '$kode_produk',
				nama_produk = '$nama_produk',
				merk_produk = '$merk_produk',
				harga_produk = '$harga_produk',
				desk_produk = '$desk_produk',
				gambar_produk = '$gambar_produk'

			WHERE kode_produk = $kode_produk


	";


	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows ($db) ;
}



// function untuk mencari data
 
function cari( $keyword ){
	global $db;

	$query = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE nama_produk LIKE '%$keyword%' OR harga_produk LIKE '%$keyword%' OR merk_produk LIKE '%$keyword%' OR nama_kategori LIKE '%$keyword%' ";

	$result = mysqli_query ($db,$query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;

}



// tambah admin
function tambah_admin ($data) {

	global $db;


	$nama = htmlspecialchars($data['nama_admin']);
	$username = htmlspecialchars(strtolower($data['username_admin']));
	$password1  = mysqli_real_escape_string($db,$data['password1']);
	$password2  = mysqli_real_escape_string($db,$data['password2']);


// cek username dan pasword tidak boleh kosong
	if(empty($username)||empty($password1)||empty($password2)) {
		echo "<script>
				alert('Username atau password tidak boleh kosong');
				document.location.href='tambah_admin.php';
			</script>
		";
		return false;
	}

// cek apakah username di gunakan di tabel admin

	if (query("SELECT * FROM admin WHERE username_admin = '$username' ")) {
		echo "<script>
				alert('Username sudah terdaftar');
				document.location.href='tambah_admin.php';
			</script>
		";
		return false;
	}


// cek jika username sudah di gunakan di tabel user

	if (query("SELECT * FROM user WHERE username_user = '$username'")) {
		echo "<script>
				alert('Username sudah terdaftar');
				document.location.href='tambah_admin.php';
			</script>
		";
		return false;
	}

// jika konfirmasi password tidak sesuai
	if ( $password1 !== $password2) {
		echo "<script>
				alert('Password tidak sesuai');
				document.location.href='tambah_admin.php';
			</script>
		";
		return false;
		
	}
// jika pasword kurang dari 5

	if (strlen($password1)<5) {
		echo "<script>
				alert('Password terlalu pendek');
				document.location.href='tambah_admin.php';
			</script>
		";
		return false;
	}

// jika usernam dan password sudah sesuiai

	$password_baru = password_hash($password2, PASSWORD_DEFAULT);

	$query = "INSERT INTO admin VALUES (
		 NULL,
		'$nama',
		'$username',
		'$password_baru')
	";
	mysqli_query($db,$query) or die(mysqli_error($db));
	return mysqli_affected_rows($db);

}


// fungsi untuk keranjang

function keranjang($data) {

	global $db;
	
	$kode_produk = $data["kode_produk"];
	$id_user = $data["id_user"];
	$jumlah = htmlspecialchars($data["jumlah_p_keranjang"]);

	if ($jumlah < 1) {
		echo "<script>
				alert('Isian jumlah produk tidak boleh nol');
			</script>";

		return false;
	}

	$query = "INSERT INTO keranjang VALUES (NULL,'$kode_produk','$id_user','$jumlah' )";
	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows ($db);

}


// hapus keranjang

function hapusKeranjang ($id){
	global $db;
	mysqli_query ($db,"DELETE FROM keranjang WHERE id_keranjang = $id");
	return mysqli_affected_rows ($db);
}


// fungsi registrasi

function registrasi ($data) {

	global $db;


	$nama = htmlspecialchars($data['nama_user']);
	$email = htmlspecialchars($data['email_user']);
	$no_telp = htmlspecialchars($data['no_telp']);
	$alamat = htmlspecialchars($data['alamat_user']);
	$username = htmlspecialchars(strtolower($data['username_user']));
	$password1  = mysqli_real_escape_string($db,$data['password1']);
	$password2  = mysqli_real_escape_string($db,$data['password2']);


// cek username dan pasword tidak boleh kosong
	if(empty($username)||empty($password1)||empty($password2)) {
		echo "<script>
				alert('Username atau password tidak boleh kosong');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
	}

// cek apakah username sudah di gunakan ditabel user
	if (query("SELECT * FROM user WHERE username_user = '$username' ")) {
		echo "<script>
				alert('Username sudah terdaftar');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
	}

// cek apakah username di gunakan di tabel admin
	
	if (query("SELECT * FROM admin WHERE username_admin = '$username' ")) {
		echo "<script>
				alert('Username sudah terdaftar');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
	}

// jika konfirmasi password tidak sesuai

	if ( $password1 !== $password2) {
		echo "<script>
				alert('Password tidak sesuai');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
		
	}

// jika username terlalu panjang

	if (strlen($username)>15) {
		echo "<script>
				alert('username terlalu panjang');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
	}
// jika pasword kurang dari 5

	if (strlen($password1)<5) {
		echo "<script>
				alert('Password terlalu pendek');
				document.location.href='registrasi.php';
			</script>
		";
		return false;
	}

// enkripsi password

	$password_hash = password_hash($password1, PASSWORD_DEFAULT);

// jika usernam dan password sudah sesuiai


	$query = "INSERT INTO user VALUES (
		NULL,
		'$nama',
		'$username',
		'$email',
		'$no_telp',
		'$alamat',
		'$password_hash')
	";
	mysqli_query($db,$query) or die(mysqli_error($db)) ;
	return mysqli_affected_rows($db);

}



function ubahProfil ($data) {

	global $db;


	$id_user = $data['id_user'];
	$nama = $data['nama'];
	$email = $data['email'];
	$no_telp = $data['telp'];
	$alamat = $data['alamat'];

	$query = "UPDATE user SET

			nama_user = '$nama',
			email_user = '$email',
			telp_user = '$no_telp',
			alamat_user = '$alamat'

			WHERE id_user = $id_user

	";

	mysqli_query($db,$query) or die(mysqli_error($db));
	return mysqli_affected_rows($db);

}

// fungsi konfirmasi pembelian

function konfirmasi ($data) {
	global $db;

	$id_user = $data['id_user'];
	$total_bayar = $data['total_bayar'];
	$id_produk = $data['id_produk'];
	$jumlah_produk = $data['jumlah_produk'];
	$alamat = $data['alamat_pengiriman'];

	$query = "INSERT INTO transaksi VALUES (NULL,'$id_user',CURRENT_TIMESTAMP,DEFAULT,'$total_bayar','$id_produk','$jumlah_produk','$alamat')";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);
}

// fungsi proses pesanan

function proses($data){

	global $db;

	$id = $data['id'];


	$query = "UPDATE transaksi SET status_transaksi = 'selesai' WHERE id_transaksi = $id";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);

}





?>