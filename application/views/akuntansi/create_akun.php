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
                                    <h4 class="page-title mb-1"> <?= $tittle ?></h4>

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
                                                    <a href="<?= base_url('akuntansi'); ?>" type="button" class="btn btn-danger waves-effect waves-light mb-3 float-right">Back</a>
                                                </div>
                                            </div>
                                            <form class="custom-validation" method="post" action="<?= base_url('akuntansi/tambahakun'); ?>">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <input type="text" value="<?= date('m/d/Y'); ?>" name="date" id="date" class="form-control datepicker-here" data-language="en" placeholder="Tanggal" required readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="no_reff">No. Reff</label>
                                                        </div>

                                                        <div class="form-group input-group">
                                                            <input type="hidden" name="id_header" id="id_header">
                                                            <input type="text" name="no_reff" id="no_reff" class="form-control" placeholder="Pilih No Reff" required autofocus>
                                                            <span class="input-group-btn">
                                                                <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".headerModal">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </span>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nama_header">Nama Header</label>
                                                            <input type="text" id="nama_header" name="nama_header" class="form-control" data-language="en" placeholder="Nama Header" required readonly />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nomor_akun">Nomor Akun</label>
                                                            <input type="text" id="nomor_akun" name="nomor_akun" class="form-control" data-timepicker="true" data-language="en" placeholder="Nomor Akun" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg">
                                                        <div class="form-group">
                                                            <label for="nama_akun">Nama Akun Perkiraan</label>

                                                            <input type="text" id="nama_akun" name="nama_akun" class="form-control" data-language="en" placeholder="Nama Akun" required />
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value=""> - Pilih salah satu - </option>
                                                        <option value="Debet">Debet</option>
                                                        <option value="Kredit">Kredit</option>
                                                    </select>
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

                <!-- End Page-content -->
                <div class="modal fade headerModal" id="headerModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Pilih Akun Header</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No.Reff</th>
                                                <th>Nama Header Akun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($header as $h) { ?>
                                                <tr>
                                                    <td><?= $h['no_reff']; ?></td>
                                                    <td><?= $h['nama_header']; ?></td>
                                                    <td>
                                                        <button id="select_header" data-id="<?= $h['id_header']; ?>" data-noreff="<?= $h['no_reff']; ?>" data-name="<?= $h['nama_header']; ?>" class="btn btn-primary">
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
                    $(document).on('click', '#select_header', function() {
                        var id_header = $(this).data('id');
                        var no_reff = $(this).data('noreff');
                        var nama_header = $(this).data('name');

                        $('#id_header').val(id_header);
                        $('#no_reff').val(no_reff);
                        $('#nama_header').val(nama_header);
                        $('#headerModal').modal('hide');
                    })
                </script>