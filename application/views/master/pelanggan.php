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

                                            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target=".agenModal">Tambah Data Pelanggan</button>
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
                                                <table id="datatable" class="table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kode Pelanggan</th>
                                                            <th>Nama</th>
                                                            <th>PIC</th>
                                                            <th>Kategori</th>
                                                            <th>Alamat</th>
                                                            <th>No.NIK</th>
                                                            <th>Barcode</th>
                                                            <th>No.Telp</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($pelanggan as $p) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $p['kode_pelanggan'] ?></td>
                                                                <td><?= $p['nama_pelanggan'] ?></td>
                                                                <td><?= $p['pic_pelanggan'] ?></td>
                                                                <td><?= $p['id_kategori'] ?></td>
                                                                <td><?= $p['alamat_pelanggan'] ?></td>
                                                                <td><?= $p['nik'] ?></td>
                                                                <td><?= $p['no_telp'] ?></td>
                                                                <td><img style="width: 50px;" src="<?= base_url('/assets/images/qrcode/pelanggan/') . $p['barcode_pelanggan'] ?>"></td>
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
                                <h5 class="modal-title mt-0">Tambah Data Pelanggan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('master/tambahpelanggan'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" placeholder="Nama pelanggan" autocomplete="off" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <select name="id_kategori" id="id_kategori" class="form-control">
                                            <option value=""> - Pilih Kategori - </option>
                                            <option value="Umum">Umum</option>
                                            <option value="Agen">Agen</option>
                                            <option value="Sub Distributor">Sub Distributor</option>
                                            <option value="Distributor">Distributor</option>
                                            <!-- <?php foreach ($kategori as $s) : ?>
                                                <option value="<?= $s['id_kategori'] ?>"><?= $s['nama_kategori'] ?></option>
                                            <?php endforeach; ?> -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="pic_pelanggan" id="pic_pelanggan" class="form-control" placeholder="PIC" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="No Telp" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" placeholder="Alamat" autocomplete="off" required>
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