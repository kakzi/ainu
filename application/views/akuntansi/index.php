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

                                            <a href="<?= base_url('akuntansi/create'); ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3">Tambah Data Akun</a>
                                            <a href="<?= base_url('produk/pdf_produk'); ?>" type="button" class="btn btn-danger waves-effect waves-light ml-1 mb-3 float-right">Export to PDF</a>

                                            <button type="button" class="btn btn-success waves-effect waves-light float-right mb-3 ml-1">Excel</button>

                                            <button type="button" class="btn btn-info waves-effect waves-light mb-3 float-right ml-1">Print</button>

                                            <!-- <form action="<?= base_url('akuntansi'); ?>" method="post" class="form-group float-right mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="keyword" placeholder="Search ..." autocomplete="off" autofocus>
                                                    <div class="input-group-append">
                                                        <input class="btn btn-success" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form> -->


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
                                                <table id="datatable" class="table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Nomor Acc</th>
                                                            <th>Nama Akun</th>
                                                            <th>Header</th>
                                                            <th>Saldo</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <!-- <?php if (empty($akun)) : ?>
                                                            <tr>
                                                                <td colspan=" 8">
                                                    <div class="alert alert-danger" role="alert">
                                                        Data Akun tidak di Temukan!
                                                    </div>
                                                    </td>
                                                    </tr>
                                                <?php endif; ?> -->
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($akun as $a) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $a['no_acc'] ?></td>
                                                                <td><?= $a['nama_akun'] ?></td>
                                                                <td><?= $a['nama_header'] ?></td>
                                                                <td><?= $a['saldo'] ?></td>
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
                                                <!-- <?= $pagination; ?> -->

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
                                <h5 class="modal-title mt-0">Tambah Data Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('akuntansi/tambahakun'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="no_acc" id="no_acc" class="form-control" placeholder="Nomor Akun" autocomplete="off" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" autocomplete="off" required>
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