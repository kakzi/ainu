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
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target=".agenModal">Tambah Data Produk</button>
                                            <a href="<?= base_url('inventory/pdf_stock'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3 ml-1 float-right">Export to PDF</a>

                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3 float-right ml-1">Excel</button>

                                            <button type="button" class="btn btn-info waves-effect waves-light mb-3 float-right">Print</button>

                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="row mt-0 ">
                                                    <div class="col-md">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <?= $this->session->flashdata('flash'); ?>.
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <div class="table-responsive">
                                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kode Produk</th>
                                                            <th>Nama</th>
                                                            <th>Stock</th>
                                                            <th>Satuan</th>
                                                            <th>HPP</th>
                                                            <th>Harga</th>
                                                            <th>Barcode</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($produk as $p) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $p['kode_produk'] ?></td>
                                                                <td><?= $p['nama_produk'] ?></td>
                                                                <td><?= $p['stock_produk'] ?></td>
                                                                <td><?= $p['nama_satuan'] ?></td>
                                                                <td><?= convertRupiah($p['hpp']) ?></td>
                                                                <td><?= convertRupiah($p['harga_jual'])  ?></td>
                                                                <td><img style="width: 50px;" src="<?= base_url('/assets/images/qrcode/produk/') . $p['barcode_produk'] ?>"></td>
                                                                <td>
                                                                    <!-- <a href="" data-toggle="modal" data-target=".ubahsubMenuModal" class="badge badge-success">Edit</a>
                                                                    <a href="" class="badge badge-danger" class="tombol-hapus">Delete</a> -->

                                                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit</button>
                                                                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- end row -->

                        </div>
                        <!-- end container-fluid -->


                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->

                <div class="modal fade agenModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Tambah Data Produk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('produk/tambahproduk'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk" autocomplete="off" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <select name="id_satuan" id="id_satuan" class="form-control">
                                            <option value="">Pilih Satuan</option>
                                            <?php foreach ($satuan as $s) : ?>
                                                <option value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="stock_produk" id="stock_produk" class="form-control" placeholder="Stock" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="hpp" id="hpp" class="form-control" placeholder="HPP" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="price" id="price" class="form-control" placeholder="Harga" autocomplete="off" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->