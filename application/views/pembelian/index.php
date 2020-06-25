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

                                            <a href="<?= base_url('pembelian/buatfaktur'); ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3">Buat Faktur Baru</a>
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

                                            <div class="table-responsive">
                                                <table id="datatable" class="table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Tanggal</th>
                                                            <th>Nama Supplier</th>
                                                            <th>Keterangan</th>
                                                            <th>Total</th>
                                                            <th>Saldo</th>
                                                            <th>Jatuh Tempo</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($faktur as $f) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $f['date_faktur_pemb'] ?></td>
                                                                <td><?= $f['nama_supplier'] ?></td>
                                                                <td><?= $f['ket_faktur_pemb'] ?></td>
                                                                <td><?= $f['total_faktur_pemb'] ?></td>
                                                                <td><?= $f['saldo_faktur_pemb'] ?></td>
                                                                <td><?= $f['jatuh_faktur_pemb'] ?></td>
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