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

                                            <a href="<?= base_url('inventory/pdf_stock'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3 ml-1 ">Export to PDF</a>

                                            <button type="button" class="btn btn-success waves-effect waves-light mb-3  ml-1">Excel</button>

                                            <button type="button" class="btn btn-info waves-effect waves-light mb-3 ">Print</button>
                                            <a href="<?= base_url('transaksi/form_angsuran') ?>" type="button" class="btn btn-primary waves-effect waves-light mb-3 float-right">Input Angsuran</a>

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
                                                            <th>Total</th>
                                                            <!-- <th>Cash</th> -->
                                                            <th>Tagihan</th>
                                                            <th>Jatuh Tempo</th>
                                                            <!-- <th>Keterangan</th> -->
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($data_tagihan as $dt) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $dt['invoice'] ?></td>
                                                                <td><?= $dt['nama_pelanggan'] == null ? "Umum" : $dt['nama_pelanggan'] ?></td>
                                                                <td><?= $dt['id_kategori'] == null ? "Umum" : $dt['id_kategori'] ?></td>
                                                                <td><?= convertRupiah($dt['total_price']) ?></td>
                                                                <!-- <td><?= convertRupiah($dt['cash']) ?></td> -->
                                                                <td><?= $dt['tagihan'] == 0 ? "Lunas" : convertRupiah($dt['tagihan']) ?></td>
                                                                <td><?= $dt['jatuh_tempo'] ?></td>
                                                                <!-- <td><?= $dt['note'] ?></td> -->
                                                                <td>
                                                                    <a href="<?= base_url('transaksi/cetak_tagihan/') . $dt['id_penjualan'] ?>" target="_blank" type="button" class="btn btn-primary btn-sm waves-effect waves-light">Cetak</a>

                                                                    <a href="<?= base_url('transaksi/cetak_tagihan/') . $dt['id_penjualan'] ?>" target="_blank" type="button" class="btn btn-success btn-sm waves-effect waves-light">Arsipkan</a>
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