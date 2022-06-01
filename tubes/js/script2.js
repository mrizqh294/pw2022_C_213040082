//halaman_admin.php
var keyword1 = document.getElementById('keyword1');
var tombol1 = document.getElementById('cari1');
var isi1 = document.getElementById('isi1');

// untuk halaman admin.php

keyword1.addEventListener("keyup", function() {
	
	// buat objecct ajax
	const ajax = new XMLHttpRequest();

	// cek kesiapan ajax
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			isi1.innerHTML = ajax.responseText;
		}
	}

	//eksekusi ajax

	//ajax.open('GET','ajax/liveSearch_index.php?keyword=' + keyword.value, true);
	ajax.open('GET','../ajax/liveSearch_admin.php?keyword1=' + keyword1.value, true);
	ajax.send();
});
