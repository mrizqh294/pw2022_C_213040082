// ambil elemen yg tadi sudah kassi tanda

// index.php
var keyword = document.getElementById('keyword');
var tombol = document.getElementById('cari');
var isi = document.getElementById('isi');





// tambahkan event ketika keyword di tulis

// untuk index.php
keyword.addEventListener("keyup", function() {
	
	// buat objecct ajax
	const ajax = new XMLHttpRequest();

	// cek kesiapan ajax
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			isi.innerHTML = ajax.responseText;
		}
	}

	//eksekusi ajax

	ajax.open('GET','ajax/liveSearch_index.php?keyword=' + keyword.value, true);
	//ajax.open('GET','../ajax/liveSearch.php?keyword=' + keyword.value, true);
	ajax.send();
});





