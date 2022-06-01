var gitar = document.getElementById('gitar');
var isiGitar = document.getElementById('isiGitar');

// untuk halaman admin.php

gitar.addEventListener("click", function() {
	
	// buat objecct ajax
	const ajax = new XMLHttpRequest();

	// cek kesiapan ajax
	ajax.onreadystatechange = function() {
		if(ajax.readyState == 4 && ajax.status == 200) {
			isiGitar.innerHTML = ajax.responseText;
		}
	}

	//eksekusi ajax

	ajax.open('GET','../ajax/liveSearch_kategori.php?gitar=' + gitar.value, true);
	ajax.send();
});