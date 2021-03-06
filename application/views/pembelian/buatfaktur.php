            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1"><?= $tittle ?></h4>
                                    <p style="font-size: 12pt; color: aliceblue">Harap semua field di isi!</p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Informasi Nota
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md mb-3">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="text" value="<?= date('Y-m-d'); ?>" name="tanggal" id="tanggal" class="form-control" data-language="en" placeholder="Tanggal" required readonly />
                                                    <div class="invalid-feedback">
                                                        Tanggal Transaksi Harus di isi.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mb-1">
                                                    <label for="jatuh_tempo">Tanggal Jatuh Tempo</label>
                                                    <input type="text" class="form-control" name="jatuh_tempo" id="jatuh_tempo" value="<?= $user['name'] ?>" placeholder="jatuh_tempo" readonly required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Akun
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mb-0">
                                                    <div>
                                                        <label for="no_acc">Kode Akun</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" name="id_akun" id="id_akun">
                                                        <input type="text" name="no_acc" id="no_acc" class="form-control" placeholder="Pilih Akun" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-akun">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mb-1">
                                                    <label for="nama_akun">Akun</label>
                                                    <input type="text" class="form-control" name="nama_akun" id="nama_akun" placeholder="Nama Akun" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Supplier
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <div>
                                                        <label for="kode_supplier">Kode Supplier</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" name="id_supplier" id="id_supplier">
                                                        <input type="text" name="kode_supplier" id="kode_supplier" class="form-control" placeholder="Pilih Supplier" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-supplier">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-md ">
                                                    <label for="nama_supplier">Nama Supplier</label>
                                                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md mb-1">
                                                    <label for="alamat_supplier">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat_supplier" id="alamat_supplier" placeholder="Alamat" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Produk
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md ">
                                                    <div>
                                                        <label for="nama_produk">Nama Produk</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" id="price">
                                                        <input type="hidden" id="id_produk">
                                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Pilih Produk" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-produk">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for="qty">Qty</label>
                                                    <input type="text" class="form-control" value="1" min="1" name="qty" id="qty" placeholder="Qty" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <button type="button" id="add_cart" class="btn btn-info btn-default float-right">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Nomor Faktur Pembelian
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mt-3 mb-3">
                                                    <h1 class="text-center"><?= $invoice ?></h1>
                                                    <p class="text-center">Kode ini ter Generate Otomatis</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Keranjang
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Produk</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Qty</th>
                                                                    <th>Harga</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cart_table">
                                                                <?php $this->view('pembelian/cart_pembelian') ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Catatan</label>s
                                                        <div>
                                                            <textarea id="note" class="form-control" rows="3"></textarea>
                                                        </div>

                                                        <label class="mt-3">Ketarangan</label>
                                                        <p>* Apabila ada catatan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mt-3">
                                                    <div class="form-group">
                                                        <label>Sub Total</label>
                                                        <div>
                                                            <input id="sub_total" type="text" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="card ">
                                        <div class="card-header bg-transparent border-bottom">
                                            Payment Detail
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Total :</h5>
                                                </div>
                                                <div class="col-md">
                                                    <h1>
                                                        <b>
                                                            <span id="grand_total" style="font-size: 50pt">
                                                                0
                                                            </span>
                                                        </b>
                                                    </h1>
                                                </div>
                                            </div>
                                            <button id="cancel_payment" type="button" class="btn btn-success waves-effect waves-light  mt-1">Batal</button>
                                            <button type="button" id="proses_payment" class="btn btn-primary waves-effect waves-light  mt-1">Buat Faktur</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
            </div>
            <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->

            <div class="modal fade modal-akun" id="modal-akun" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Akun Perkiraan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No Acc</th>
                                            <th>Nama Akun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($akun as $a) { ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $a['no_acc']; ?></td>
                                                <td> <?= $a['nama_akun']; ?></td>
                                                <td>
                                                    <button id="select_akun" data-id="<?= $a['id_akun']; ?>" data-kode="<?= $a['no_acc']; ?>" data-name="<?= $a['nama_akun']; ?>" class="btn btn-primary">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade modal-supplier" id="modal-supplier" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Supplier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Kode supplier</th>
                                            <th>Nama</th>
                                            <th>PIC</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($supplier as $p) { ?>
                                            <tr>
                                                <td><?= $p['kode_supplier']; ?></td>
                                                <td><?= $p['nama_supplier']; ?></td>
                                                <td> <?= $p['pic_supplier']; ?></td>
                                                <td><?= $p['alamat_supplier']; ?></td>
                                                <td>
                                                    <button id="select_supplier" data-id="<?= $p['id_supplier']; ?>" data-kode="<?= $p['kode_supplier']; ?>" data-name="<?= $p['nama_supplier']; ?>" data-alamat="<?= $p['alamat_supplier']; ?>" class="btn btn-primary">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- MODAL ADD ITEM -->
            <div class="modal fade modal-produk" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produk as $p) { ?>
                                            <tr>
                                                <td><?= $p['kode_produk']; ?></td>
                                                <td><?= $p['nama_produk']; ?></td>
                                                <td> <?= $p['nama_satuan']; ?></td>
                                                <td><?= $p['stock_produk']; ?></td>
                                                <td><?= convertRupiah($p['harga_jual']); ?></td>
                                                <td>
                                                    <button id="select_p" data-id="<?= $p['id_produk']; ?>" data-kode="<?= $p['kode_produk']; ?>" data-name="<?= $p['nama_produk']; ?>" data-hpp="<?= $p['hpp']; ?>" data-price="<?= $p['harga_jual']; ?>" data-stock="<?= $p['stock_produk']; ?>" class="btn btn-primary">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade modal-item-edit" id="modal-item-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Upadate data keranjang Pembelian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_cart_item">
                            <div class="form-group">
                                <label for="produk_item">Produk</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" id="barcode_item" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="produk_item" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="price_item">Harga</label>
                                        <input type="number" id="price_item" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="qty_item">QTY</label>
                                        <input type="number" id="qty_item" min="1" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="total_item">Total Harga</label>
                                        <input type="number" id="total_item" min="0" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-right">
                                <button type="button" id="edit_cart" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

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

                $(document).on('click', '#select_supplier', function() {

                    $('#id_supplier').val($(this).data('id'));
                    $('#kode_supplier').val($(this).data('kode'));
                    $('#nama_supplier').val($(this).data('name'));
                    $('#alamat_supplier').val($(this).data('alamat'));
                    $('#kategori_supplier').val($(this).data('kategori'));
                    $('#modal-supplier').modal('hide');
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
                    var qty = $('#qty').val()
                    if (id_produk == '') {
                        alert('Produk belum di pilih')
                        $('#kode_produk').focus()
                    } else {

                        jQuery.ajax({
                            type: 'POST',
                            url: '<?= base_url('pembelian/proses'); ?>',
                            data: {
                                'add_cart': true,
                                'id_produk': id_produk,
                                'harga_barang': price,
                                'qty_barang': qty
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                if (result.success == true) {
                                    $('#cart_table').load('<?= base_url('pembelian/cart_data') ?>', function() {
                                        calculate()
                                    })
                                    $('#id_produk').val('')
                                    $('#kode_produk').val('')
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
                    // $('#total_before').val($(this).data('price') * $(this).data('qty'));
                    // $('#diskon_item').val($(this).data('diskon'));
                    $('#total_item').val($(this).data('total'));
                    // $('#laba_item').val($(this).data('laba'));
                    // $('#hpp_item').val($(this).data('hpp'));

                })

                function hitung_edit_modal() {
                    var price = $('#price_item').val()
                    var qty = $('#qty_item').val()

                    total = price * qty
                    $('#total_item').val(total)

                }

                $(document).on('keyup mouseup', '#price_item, #qty_item', function() {
                    hitung_edit_modal()
                })



                $(document).on('click', '#edit_cart', function() {
                    var id_cart = $('#id_cart_item').val()
                    var price = $('#price_item').val()
                    var qty = $('#qty_item').val()
                    var total = $('#total_item').val()

                    if (price == '' || price < 1) {
                        alert('Harga tidak boleh kosong')
                        $('#price_item').focus()
                    } else if (qty == '' || qty < 1) {
                        alert('Qty tidak boleh kosong')
                        $('#qty_item').focus()

                    } else {

                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url('pembelian/proses'); ?>',
                            data: {
                                'edit_cart': true,
                                'id_cart_pembelian': id_cart,
                                'harga_barang': price,
                                'qty_barang': qty,
                                'total_harga': total
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                if (result.success == true) {
                                    $('#cart_table').load('<?= base_url('pembelian/cart_data') ?>', function() {
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

                    // var laba = 0;
                    // $('#cart_table tr').each(function() {
                    //     laba += parseInt($(this).find('#laba').text())
                    // })
                    // isNaN(laba) ? $('#laba_sale').val(0) : $('#laba_sale').val(laba);

                    // var hpp_sale = 0;
                    // $('#cart_table tr').each(function() {
                    //     hpp_sale += parseInt($(this).find('#hpp_cart').text())
                    // })
                    // isNaN(hpp_sale) ? $('#hpp_sale').val(0) : $('#hpp_sale').val(hpp_sale);

                    // var diskon = $('#diskon_total').val()
                    var grand_total = subtotal
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
            </script>