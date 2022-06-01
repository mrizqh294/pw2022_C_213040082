var keyword2 = document.getElementById('keyword2');
var tombol2 = document.getElementById('cari2');
var isi2 = document.getElementById('isi2');

// untuk halaman admin.php

keyword2.addEventListener("keyup", function() {
	
	// buat objecct ajax
	const ajax = new XMLHttpRequest();

	// cek kesiapan ajax
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			isi2.innerHTML = ajax.responseText;
		}
	}

	//eksekusi ajax

	//ajax.open('GET','ajax/liveSearch_index.php?keyword=' + keyword.value, true);
	ajax.open('GET','../ajax/liveSearch_user.php?keyword2=' + keyword2.value, true);
	ajax.send();
});