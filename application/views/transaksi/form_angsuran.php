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

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg">
                                                    <a href="<?= base_url('transaksi/angsuran'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3 float-right">Back</a>
                                                </div>
                                            </div>
                                            <form class="custom-validation" method="post" action="<?= base_url('transaksi/tambahangsuran'); ?>">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" value="<?= date('Y-m-d'); ?>" name="date" id="date" class="form-control datepicker-here" data-language="en" placeholder="Tanggal" required />
                                                </div>

                                                <div>
                                                    <label for="invoice">Invoice</label>
                                                </div>

                                                <div class="form-group input-group">
                                                    <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                                                    <input type="hidden" name="id_penjualan" id="id_penjualan">
                                                    <input type="text" name="invoice" id="invoice" class="form-control" placeholder="Pilih Invoice" required autofocus>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-angsuran">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nama_pelanggan">Nama Pelanggan</label>
                                                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control" data-language="en" placeholder="Nama Pelanggan" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="id_kategori">Kategori</label>

                                                            <input type="text" id="id_kategori" name="id_kategori" class="form-control" data-language="en" placeholder="Satuan" required readonly />
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Total Tagihan</label>
                                                            <input type="text" id="tagihan" name="tagihan" class="form-control" data-language="en" required readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Tagihan Pokok</label>
                                                            <input type="text" id="t_pokok" name="t_pokok" class="form-control" data-language="en" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Potensi Laba</label>
                                                            <input type="text" id="p_laba" name="p_laba" class="form-control" data-language="en" required readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Angsuran Pokok</label>
                                                            <input type="text" id="angsuran" name="angsuran" class="form-control" placeholder="Nominal" required autocomplete="off" />
                                                        </div>
                                                    </div>

                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Nominal Laba</label>
                                                            <input type="text" id="n_laba" name="n_laba" class="form-control" placeholder="Nominal" required autocomplete="off" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Saldo Pokok</label>
                                                            <input type="text" id="sisa" name="sisa" class="form-control" data-language="en" required readonly />
                                                        </div>

                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Saldo Laba</label>
                                                            <input type="text" id="saldo_laba" name="saldo_laba" class="form-control" data-language="en" required readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label>Sisa Tagihan</label>
                                                            <input type="text" id="saldo_tagihan" name="saldo_tagihan" class="form-control" data-language="en" required readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <div>
                                                        <textarea id="keterangan" name="keterangan" required placeholder="Catatan" class="form-control" autocomplete="off" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div>
                                                        <button id="proses_angsuran" type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                            Tambah
                                                        </button>
                                                        <button type="reset" class="btn btn-danger waves-effect waves-light mr-1">
                                                            Reset
                                                        </button>
                                                        <a href="<?= base_url('transaksi/angsuran'); ?>" type="button" class="btn btn-secondary waves-effect">
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            <!-- end row -->
                        </div>
                        <!-- end container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->
                <div class="modal fade modal-angsuran" id="modal-angsuran" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Pilih Invoice Penjualan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Kategori</th>
                                                <th>Tagihan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($penjualan as $p) { ?>
                                                <tr>
                                                    <td><?= $p['invoice']; ?></td>
                                                    <td><?= $p['nama_pelanggan']; ?></td>
                                                    <td> <?= $p['id_kategori']; ?></td>
                                                    <td id="lunas"><?= $p['tagihan'] == 0 ? "Lunas" : convertRupiah($p['tagihan']) ?></td>
                                                    <td>
                                                        <button id="select" data-id="<?= $p['id_penjualan']; ?>" data-pel="<?= $p['id_pelanggan']; ?>" data-invoice="<?= $p['invoice']; ?>" data-name="<?= $p['nama_pelanggan']; ?>" data-tpokok="<?= $p['hpp_total'] ?>" data-plaba="<?= $p['laba']; ?>" data-kategori="<?= $p['id_kategori']; ?>" data-tagihan="<?= $p['tagihan']; ?>" class="btn btn-primary">
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

                <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>

                <script>
                    $(document).on('click', '#select', function() {
                        var id_penjualan = $(this).data('id');
                        var id_pelanggan = $(this).data('pel');
                        var p_laba = $(this).data('plaba');
                        var hpp_total = $(this).data('tpokok');
                        var invoice = $(this).data('invoice');
                        var nama_pelanggan = $(this).data('name');
                        var id_kategori = $(this).data('kategori');
                        var tagihan = $(this).data('tagihan');
                        var sisa = $(this).data('sisa');
                        var saldo_laba = $(this).data('saldo_laba');
                        $('#id_penjualan').val(id_penjualan);
                        $('#id_pelanggan').val(id_pelanggan);
                        $('#invoice').val(invoice);
                        $('#nama_pelanggan').val(nama_pelanggan);
                        $('#id_kategori').val(id_kategori);
                        $('#tagihan').val(tagihan);
                        $('#t_pokok').val(hpp_total);
                        $('#p_laba').val(p_laba);
                        $('#sisa').val(sisa);
                        $('#saldo_laba').val(saldo_laba);
                        $('#modal-angsuran').modal('hide');
                    })

                    function hitung() {
                        var tagihan = $('#tagihan').val()
                        var tpokok = $('#t_pokok').val()
                        var angsuran = $('#angsuran').val()
                        var plaba = $('#p_laba').val()
                        var nlaba = $('#n_laba').val()
                        angsuran != 0 ? $('#sisa').val(tpokok - angsuran) : $('#sisa').val(0)
                        nlaba != 0 ? $('#saldo_laba').val(plaba - nlaba) : $('#saldo_laba').val(0)
                        angsuran && nlaba != 0 ? $('#saldo_tagihan').val((tpokok - angsuran) + (plaba - nlaba)) : $('#saldo_tagihan').val(0)


                    }

                    $(document).on('keyup mouseup', '#angsuran,#n_laba', function() {
                        hitung()
                        // sisaTagihan()
                    })

                    $(document).ready(function() {
                        hitung()
                        //sisaTagihan()
                    })
                </script>