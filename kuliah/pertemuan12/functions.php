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

	$nama = htmlspecialchars($data["nama"]);
	$npm = htmlspecialchars($data["npm"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$email = htmlspecialchars($data["email"]);
	$gambar = htmlspecialchars($data["gambar"]);

	$query ="INSERT INTO mahasiswa VALUES ( null,'$nama','$npm','$email','$jurusan', '$gambar')";

	mysqli_query($db,$query) or die(mysqli_error($db));

	return mysqli_affected_rows($db);

}

function hapus($id) {

	$db = koneksi();

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


