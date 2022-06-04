function preview() {
	const gambar = document.querySelector('#gambar_produk');
	const prev = document.querySelector('#prev');
	//prev.style.display = 'block';
	var oFReader = new FileReader();
	oFReader.readAsDataURL(gambar.files[0]);

	oFReader.onload = function(oFREvent) {
		prev.src = oFREvent.target.result;
	};
}