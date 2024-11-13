		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="/node_modules/moment/moment.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
		<script>
			const urlRegistrasi = 'https://sbcmakassarclass.celebesdigital.id/admin/validasi/cekDataPeserta';
			const displayContainer = document.querySelector('.display');
			const greetingsDisplay = document.querySelector('.greetings');
			let displayNama = document.querySelector('.displayNamaPeserta');

			setInterval(() => {
				cekDataPeserta(urlRegistrasi)
			}, 1000);

			function	cekDataPeserta(url) {
				fetch(url)
				.then((resp) => {
					return resp.text()
					// if ( resp.length > 0 ) {
					// }
				})
					.then((data) => {
						displayNama.innerHTML = data;
					})
			}

			function insertAfter(newNode, existingNode) {
				existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
			}
		</script>
	</body>
</html>