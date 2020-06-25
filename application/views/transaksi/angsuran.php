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

                                            <a href="<?= base_url('transaksi/form_angsuran') ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3">Input Angsuran</a>
                                            <a href="<?= base_url('tagihan') ?>" type="button" class="btn btn-info waves-effect waves-light mb-3">Data Tagihan</a>

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
                                                            <th>Invoice</th>
                                                            <th>Pelanggan</th>
                                                            <th>Kategori</th>
                                                            <th>Angsuran</th>
                                                            <th>Tanggal</th>
                                                            <th>Keterangan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($angsuran as $a) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $a['invoice'] ?></td>
                                                                <td><?= $a['nama_pelanggan'] == null ? "Umum" : $a['nama_pelanggan'] ?></td>
                                                                <td><?= $a['id_kategori'] == null ? "Umum" : $a['id_kategori'] ?></td>
                                                                <td><?= convertRupiah($a['angsuran_pokok'] + $a['angsuran_laba']) ?></td>
                                                                <td><?= $a['date_angsuran'] ?></td>
                                                                <td><?= $a['keterangan_a'] ?></td>
                                                                <td>
                                                                    <!-- <a href="" data-toggle="modal" data-target=".ubahsubMenuModal" class="badge badge-success">Edit</a>
                                                                    <a href="" class="badge badge-danger" class="tombol-hapus">Delete</a> -->

                                                                    <a href="<?= base_url(); ?>transaksi/cetak_angsuran/<?= $a['id_angsuran']; ?>" type="button" target="_blank" class="btn btn-primary btn-sm waves-effect waves-light">Cetak Struk</a>
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