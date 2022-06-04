<?php 

// fungsi koneksi database

function koneksi() {

	// koneksi ke database
	$db = mysqli_connect("localhost", "root", "", "pw_2022_c_213040082" ) or die('koneksi gagal');

	 return $db;
}

// fungsi query

function query($query) {

	$db = koneksi();

	// query ke tabel mahasiswa
	$result = mysqli_query($db, $query) or die(mysqli_error($db));


	// siapkan data $mahasiswa
	$rows = [];

	while($row = mysqli_fetch_assoc($result)){
	    $rows [] = $row;
	}

	return $rows;

}



function tambah($data) {

	$db = koneksi();

	if ($_FILES['gambar']['error']===4) {
		$gambar = 'nophoto.jpg';
	} else {
		$gambar = upload();

		// jika upload gagal
		if (!$gambar) {
			return false;
		}
	}

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$email = htmlspecialchars($data["email"]);
	

	$query ="INSERT INTO mahasiswa VALUES ( null,'$nama','$npm','$email','$jurusan', '$gambar')";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);

}

function hapus($id) {

	$db = koneksi();

	// query mhasiswa berdasarkan id

	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

	// hapus file gambar juga

	if ($mhs['gambar'] !=='nophoto.jpg') {
		unlink('img/'.$mhs['gambar']);
	}

	$query ="DELETE FROM mahasiswa WHERE id = $id ";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);

}

function ubah($data) {

	$db = koneksi();

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$email = htmlspecialchars($data["email"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query ="UPDATE mahasiswa SET nama = '$nama', npm = '$npm', email = '$email', jurusan = '$jurusan', gambar = '$gambar' WHERE id = $id";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);

}

function upload() {
	// siapkan data gambar
	$filename = $_FILES['gambar']['name'];
	$filetmpname =$_FILES['gambar']['tmp_name'];
	$filesize =$_FILES['gambar']['size'];
	$filetype = pathinfo($filename, PATHINFO_EXTENSION);
	$allowedtype =["jpg","png","jpeg"];


	// yang diupload gambar atau bukan

	if (!in_array($filetype, $allowedtype)) {
		echo "<script>
				alert('yang anda upload bukan gambar');
		</script>";

		return false;
	}


	// cek apakah gambar terlalu besar

	if ($filesize > 1000000) {
		echo "<script>
				alert('Ukuran gambar terlau besar');
		</script>";

		return false;
	}

	// lolos pengecekan siap untuk upload

	$newfilename = uniqid().$filename;

	move_uploaded_file($filetmpname, 'img/'.$newfilename);

	return $filename;
}


