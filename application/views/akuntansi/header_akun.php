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

                                            <button data-toggle="modal" data-target=".headerModal" type="button" class="btn btn-primary waves-effect waves-light mb-3">Buat Baru</button>
                                            <a href="<?= base_url('produk/pdf_produk'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3">Export to PDF</a>

                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3">Excel</button>

                                            <button type="button" class="btn btn-info waves-effect waves-light mb-3">Print</button>

                                            <form action="<?= base_url('akuntansi/header_akun'); ?>" method="post" class="form-group float-right mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="keyword" placeholder="Search ..." autocomplete="off" autofocus>
                                                    <div class="input-group-append">
                                                        <input class="btn btn-success" type="submit" name="submit">
                                                    </div>
                                                </div>
                                            </form>


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


                                            <h5>Total Data : <?= $total_rows; ?></h5>

                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>No. Reff</th>
                                                            <th>Nama Header</th>
                                                            <!-- <th>Debit</th>
                                                            <th>Kredit</th>
                                                            <th>Saldo</th> -->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php if (empty($header)) : ?>
                                                            <tr>
                                                                <td colspan="8">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        Data header tidak di Temukan!
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                        <?php foreach ($header as $a) : ?>
                                                            <tr>
                                                                <th scope="row"><?= ++$start; ?></th>
                                                                <td><?= $a['no_reff'] ?></td>
                                                                <td><?= $a['nama_header'] ?></td>

                                                                <!-- <td><?= $a['debit'] ?></td>
                                                                <td><?= $a['kredit'] ?></td>
                                                                <td><?= $a['saldo'] ?></td> -->
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

                <div class="modal fade headerModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Tambah Data Header Akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('akuntansi/tambah_header'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="no_reff" id="no_reff" class="form-control" placeholder="Nomor Reff" autocomplete="off" autofocus required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="nama_header" id="nama_header" class="form-control" placeholder="Nama Header" autocomplete="off" required>
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