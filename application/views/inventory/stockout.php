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

                                            <a href="<?= base_url('inventory/form_stock_out'); ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3">Tambah Data</a>
                                        

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
                                                            <th>Produk</th>
                                                            <th>QTY</th>
                                                            <th>Keterangan</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($stock as $s) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $s['kode_produk'] ?></td>
                                                                <td><?= $s['nama_produk'] ?></td>
                                                                <td><?= $s['qty_p'] ?></td>
                                                                <td><?= $s['detail'] ?></td>
                                                                <td><?= $s['date_stock'] ?></td>
                                                                <td>
                                                                    <a href="<?= base_url(); ?>inventory/delete_stock_out/<?= $s['stock_id']; ?>/<?= $s['id_produk']; ?>" type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Anda yakin menghapus Data ini?')">Delete</a>
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