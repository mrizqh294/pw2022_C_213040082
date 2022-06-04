function previmg() {
	const gambar = document.querySelector('#gambar');
	const imgprev = document.querySelector('#imgprev');
	imgprev.style.display = 'block';
	var oFReader = new FileReader();
	oFReader.readAsDataURL(gambar.files[0]);

	oFReader.onload = function(oFREvent) {
		imgprev.src = oFREvent.target.result;
	};
}