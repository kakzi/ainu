const flashData = $('.flash-data').data('flashdata');

if (flashData) {

	Swal.fire(
		'Data Sub Menu',
		'Berhasil ' + flashData,
		'success'
	)
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault()
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you sure?',
		text: "Kamu akan menghapus Data ini!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
		if (result.value) {
			Swal.fire(
				document.location.href = href
			)
		}
	})

});
