<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?= date('Y') ?> © Sistem Air Minum NU
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-nonDe d-sm-block">
                    Made with <i class="mdi mdi-heart text-danger"></i> by Santri Developer
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->

<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

<script src="<?= base_url(); ?>assets/js/unicons/bundle.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.all.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.min.js"></script>


<!-- Spectrum colorpicker -->
<script src="<?= base_url(); ?>assets/libs/spectrum-colorpicker/spectrum.js"></script>

<!-- Selectize -->
<script src="<?= base_url(); ?>assets/libs/selectize/js/standalone/selectize.min.js"></script>

<!-- datepicker -->
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

<script src="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- Form Advanced init -->
<script src="<?= base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>

<script src="<?= base_url(); ?>assets/js/app.js"></script>

<script>

</script>

<script>
    $(document).on('click', '#proses_payment', function() {
        var id_akun = $('#id_akun').val()
        var id_pelanggan = $('#id_pelanggan').val()
        var subtotal = $('#sub_total').val()
        var diskon = $('#diskon_total').val()
        var grandtotal = $('#grand_total').text()
        var bayar = $('#bayar').val()
        var change = $('#change').val()
        var tagihan = $('#tagihan').val()
        var hpp_sale = $('#hpp_sale').val()
        var laba = $('#laba_sale').val()
        var jenis_payment = $('#jenis_payment').val()
        var note = $('#note').val()
        var date = $('#tanggal').val()
        if (subtotal < 1) {
            alert('Belum ada produk item yang di pilih')
            $('#kode_produk').focus()
        } else if (id_akun == '') {
            alert('Silahkan isi Field akun!')
            $('#no_acc').focus()
        } else {
            if (confirm('Yakin proses transaksi ini?')) {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('transaksi/proses') ?>',
                    data: {
                        'proses_payment': true,
                        'id_pelanggan': id_pelanggan,
                        'id_akun': id_akun,
                        'subtotal': subtotal,
                        'diskon': diskon,
                        'grandtotal': grandtotal,
                        'jenis_payment': jenis_payment,
                        'bayar': bayar,
                        'change': change,
                        'tagihan': tagihan,
                        'hpp_total': hpp_sale,
                        'laba': laba,
                        'note': note,
                        'date': date
                    },
                    dataType: 'JSON',
                    success: function(result) {
                        if (result.success) {
                            alert('Transaksi berhasil');
                            window.open('<?= base_url('transaksi/cetak/') ?>' + result.id_penjualan,
                                '_blank')
                        } else {
                            alert('Transaksi gagal')
                        }
                        location.href = '<?= base_url('transaksi') ?>'
                    }
                })
            }
        }
    })

    $(document).on('click', '#select_akun', function() {

        $('#id_akun').val($(this).data('id'));
        $('#no_acc').val($(this).data('kode'));
        $('#nama_akun').val($(this).data('name'));
        $('#modal-akun').modal('hide');
    })

    $(document).on('click', '#select_pelanggan', function() {

        $('#id_pelanggan').val($(this).data('id'));
        $('#kode_pelanggan').val($(this).data('kode'));
        $('#nama_pelanggan').val($(this).data('name'));
        $('#alamat_pelanggan').val($(this).data('alamat'));
        $('#kategori_pelanggan').val($(this).data('kategori'));
        $('#modal-pelanggan').modal('hide');
    })

    $(document).on('click', '#select_p', function() {

        $('#id_produk').val($(this).data('id'));
        $('#kode_produk').val($(this).data('kode'));
        $('#nama_produk').val($(this).data('name'));
        $('#hpp').val($(this).data('hpp'));
        $('#price').val($(this).data('price'));
        $('#stock').val($(this).data('stock'));
        $('#modal-produk').modal('hide');
    })


    $(document).on('click', '#add_cart', function() {
        var id_produk = $('#id_produk').val()
        var price = $('#price').val()
        var hpp = $('#hpp').val()
        var stock = $('#stock').val()
        var qty = $('#qty').val()
        if (id_produk == '') {
            alert('Produk belum di pilih')
            $('#kode_produk').focus()
        } else if (stock < 1) {
            alert('Stok tidak cukup')
            $('#id_produk').val('')
            $('#kode_produk').val('')
            $('#kode_produk').focus()
        } else {

            jQuery.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/proses'); ?>',
                data: {
                    'add_cart': true,
                    'id_produk': id_produk,
                    'price': price,
                    'hpp': hpp,
                    'qty': qty
                },
                dataType: 'JSON',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= base_url('transaksi/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#id_produk').val('')
                        $('#kode_produk').val('')
                        $('#stock').val('')
                        $('#qty').val(1)
                        $('#kode_produk').focus()
                    } else {
                        alert('Gagal menambahkan!')
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_cart', function() {
        if (confirm('Apakah anda yakin?')) {
            var id_cart = $(this).data('cartid')
            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/cart_del') ?>',
                dataType: 'JSON',
                data: {
                    'id_cart': id_cart
                },
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= base_url('transaksi/cart_data') ?>', function() {
                            calculate()
                        })
                    } else {
                        alert('Gagal menghapus Cart');
                    }
                }
            })
        }
    })

    $(document).on('click', '#update_cart', function() {
        $('#id_cart_item').val($(this).data('cartid'));
        $('#barcode_item').val($(this).data('kode'));
        $('#produk_item').val($(this).data('product'));
        $('#price_item').val($(this).data('price'));
        $('#qty_item').val($(this).data('qty'));
        $('#total_before').val($(this).data('price') * $(this).data('qty'));
        $('#diskon_item').val($(this).data('diskon'));
        $('#total_item').val($(this).data('total'));
        $('#laba_item').val($(this).data('laba'));
        $('#hpp_item').val($(this).data('hpp'));

    })

    function hitung_edit_modal() {
        var price = $('#price_item').val()
        var qty = $('#qty_item').val()
        var diskon = $('#diskon_item').val()
        var hpp = $('#hpp_item').val()

        total_before = price * qty
        $('#total_before').val(total_before)

        total = (price - diskon) * qty
        $('#total_item').val(total)

        produksi = (hpp - diskon) * qty

        laba = total - produksi
        $('#laba_item').val(laba)

        if (diskon == '') {
            $('#diskon_item').val(0)

        }
    }

    $(document).on('keyup mouseup', '#price_item, #qty_item, #diskon_item', function() {
        hitung_edit_modal()
    })



    $(document).on('click', '#edit_cart', function() {
        var id_cart = $('#id_cart_item').val()
        var price = $('#price_item').val()
        var qty = $('#qty_item').val()
        var diskon = $('#diskon_item').val()
        var total = $('#total_item').val()
        var laba = $('#laba_item').val()

        if (price == '' || price < 1) {
            alert('Harga tidak boleh kosong')
            $('#price_item').focus()
        } else if (qty == '' || qty < 1) {
            alert('Qty tidak boleh kosong')
            $('#qty_item').focus()

        } else {

            $.ajax({
                type: 'POST',
                url: '<?= base_url('transaksi/proses'); ?>',
                data: {
                    'edit_cart': true,
                    'id_cart': id_cart,
                    'price': price,
                    'qty': qty,
                    'diskon': diskon,
                    'total': total,
                    'laba': laba
                },
                dataType: 'JSON',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= base_url('transaksi/cart_data') ?>', function() {
                            calculate()
                        })

                        alert('Data item cart berhasi di ubah!')
                        $('#modal-item-edit').modal('hide')
                    } else {
                        alert('Data item cart gagal di ubah')
                    }
                }
            })
        }
    })

    function calculate() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total').text())
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal);

        var laba = 0;
        $('#cart_table tr').each(function() {
            laba += parseInt($(this).find('#laba').text())
        })
        isNaN(laba) ? $('#laba_sale').val(0) : $('#laba_sale').val(laba);

        var hpp_sale = 0;
        $('#cart_table tr').each(function() {
            hpp_sale += parseInt($(this).find('#hpp_cart').text())
        })
        isNaN(hpp_sale) ? $('#hpp_sale').val(0) : $('#hpp_sale').val(hpp_sale);

        var diskon = $('#diskon_total').val()
        var grand_total = subtotal - diskon
        if (isNaN(grand_total)) {
            $('#grand_total').text(0)
        } else {
            $('#grand_total').text(grand_total)
        }

        $('#jenis_payment').change(function() {
            var value = $(this).val()
        })

        var bayar = $('#bayar').val();
        var change = bayar - grand_total;
        if (isNaN(change)) {
            $('#change').val(0)
        } else {
            $('#change').val(change)
        }

        var tagihan = grand_total - bayar;
        if (isNaN(tagihan)) {
            $('#tagihan').val(0)
        } else {
            $('#tagihan').val(tagihan)
        }
    }

    //'keyup mouseup' fungsi ketika id dari #diskon_total dan #bayar
    $(document).on('keyup mouseup', '#diskon_total, #bayar', function() {
        //fungsi hitung kembali
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess') ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        })
    });

    $(document).ready(function() {

        $(document).on('click', '#select', function() {
            var id_produk = $(this).data('id');
            var kode_produk = $(this).data('kode');
            var nama_produk = $(this).data('name');
            var nama_satuan = $(this).data('satuan');
            var stock = $(this).data('stock');
            $('#id_produk').val(id_produk);
            $('#kode_produk').val(kode_produk);
            $('#nama_produk').val(nama_produk);
            $('#id_satuan').val(nama_satuan);
            $('#stock').val(stock);
            $('#modal-produk').modal('hide');
        })

        $(document).on('click', '#select_header', function() {
            var id_header = $(this).data('id');
            var no_reff = $(this).data('noreff');
            var nama_header = $(this).data('name');

            $('#id_header').val(id_header);
            $('#no_reff').val(no_reff);
            $('#nama_header').val(nama_header);
            $('#headerModal').modal('hide');
        })
    })
</script>

</body>

</html>