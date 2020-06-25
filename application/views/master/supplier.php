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

                                            <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal" data-target=".agenModal">Tambah Data Supplier</button>
                                            <a href="<?= base_url('master/pdfsupplier'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3">Export to PDF</a>

                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3">Excel</button>

                                            <button type="button" class="btn btn-info waves-effect waves-light mb-3">Print</button>

                                            <form action="<?= base_url('master/supplier'); ?>" method="post" class="form-group float-right mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="keyword" placeholder="Search ..." autocomplete="off" autofocus>
                                                    <div class="input-group-append">
                                                        <input class="btn btn-success" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form>


                                            <?php if ($this->session->flashdata('flash')) : ?>
                                                <div class="row mt-0 ">
                                                    <div class="col-md-6">
                                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            <?= $this->session->flashdata('flash'); ?>.
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <h5>Total Data : <?= $total_rows; ?></h5>

                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Kode Supplier</th>
                                                            <th>Nama</th>
                                                            <th>PIC</th>
                                                            <th>Alamat</th>
                                                            <th>Telp/WA</th>
                                                            <th>Deskripsi</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (empty($supplier)) : ?>
                                                            <tr>
                                                                <td colspan="8">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Data Supplier tidak di Temukan!
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php foreach ($supplier as $s) : ?>
                                                            <tr>
                                                                <th scope="row"><?= ++$start; ?></th>
                                                                <td><?= $s['kode_supplier'] ?></td>
                                                                <td><?= $s['nama_supplier'] ?></td>

                                                                <td><?= $s['pic_supplier'] ?></td>
                                                                <td><?= $s['alamat_supplier'] ?></td>
                                                                <td><?= $s['telp_supplier'] ?></td>

                                                                <td><?= $s['deskripsi'] ?></td>
                                                                <td>
                                                                    <!-- <a href="" data-toggle="modal" data-target=".ubahsubMenuModal" class="badge badge-success">Edit</a>
                                                                    <a href="" class="badge badge-danger" class="tombol-hapus">Delete</a> -->

                                                                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Edit</button>
                                                                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                                <?= $pagination; ?>

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
                                <h5 class="modal-title mt-0">Tambah Data Supplier</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('master/tambahsupplier'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" placeholder="Nama Supplier" autocomplete="off" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nik" id="nik" class="form-control" placeholder="Nomor Indentitas" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="alamat_supplier" id="alamat_supplier" class="form-control" placeholder="Alamat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telp_supplier" id="telp_supplier" autocomplete="off" class="form-control" placeholder="Telp" required>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <textarea name="deskripsi" placeholder="Deskripsi" id="deskripsi" required class="form-control" rows="3"></textarea>
                                        </div>
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