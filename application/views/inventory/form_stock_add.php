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
                                                    <a href="<?= base_url('inventory'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3 float-right">Back</a>
                                                </div>
                                            </div>
                                            <form class="custom-validation" method="post" action="<?= base_url('inventory/tambahstok'); ?>">
                                                <div class="form-group">
                                                    <label>Date</label>
                                                    <input type="text" value="<?= date('m/d/Y'); ?>" name="date" id="date" class="form-control datepicker-here" data-language="en" placeholder="Tanggal" required />
                                                </div>

                                                <div>
                                                    <label for="kode_produk">Kode Produk</label>
                                                </div>

                                                <div class="form-group input-group">
                                                    <input type="hidden" name="id_produk" id="id_produk">
                                                    <input type="text" name="kode_produk" id="kode_produk" class="form-control" placeholder="Pilih Kode Produk" required autofocus>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-produk">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </span>

                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nama_produk">Produk name</label>
                                                            <input type="text" id="nama_produk" name="nama_produk" class="form-control" data-language="en" placeholder="Nama produk" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="satuan">Satuan</label>

                                                            <input type="text" id="id_satuan" name="id_satuan" class="form-control" data-language="en" placeholder="Satuan" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="stock">Stock Awal</label>
                                                            <input type="text" id="stock" name="stock" class="form-control" data-timepicker="true" data-language="en" placeholder="Stock awal" required readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Supplier</label>
                                                    <select name="supplier" class="selectize">
                                                        <option value=""> -Pilih Salah satu - </option>
                                                        <?php foreach ($supplier as $s) : ?>
                                                            <option value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>QTY</label>
                                                    <input type="text" id="qty" name="qty" class="form-control" data-language="en" placeholder="Jumlah" required autocomplete="off" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Keterangan</label>
                                                    <div>
                                                        <textarea id="keterangan" name="keterangan" required placeholder="Catatan" class="form-control" autocomplete="off" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                            Tambah
                                                        </button>
                                                        <button type="reset" class="btn btn-danger waves-effect waves-light mr-1">
                                                            Reset
                                                        </button>
                                                        <a href="<?= base_url('inventory'); ?>" type="button" class="btn btn-secondary waves-effect">
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
                <div class="modal fade modal-produk" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Pilih Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>Kode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Satuan</th>
                                                <th>Stock</th>
                                                <!-- <th>Harga</th> -->
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
                                                    <!-- <td><?= convertRupiah($p['harga_jual']); ?></td> -->
                                                    <td>
                                                        <button id="select" data-id="<?= $p['id_produk']; ?>" data-kode="<?= $p['kode_produk']; ?>" data-name="<?= $p['nama_produk']; ?>" data-satuan="<?= $p['nama_satuan']; ?>" data-stock="<?= $p['stock_produk']; ?>" class="btn btn-primary">
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


                <script>
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
                </script>