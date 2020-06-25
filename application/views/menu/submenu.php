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

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>

                        <?php endif; ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-toggle="modal" data-target=".subMenuModal">Add New Submenu</button>

                                            <?php if (validation_errors()) : ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?= validation_errors(); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Sub Menu</th>
                                                            <th>Menu</th>
                                                            <th>Url</th>
                                                            <th>Icon</th>
                                                            <th>Active</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($subMenu as $sm) : ?>
                                                            <tr>
                                                                <th scope="row"><?= $i; ?></th>
                                                                <td><?= $sm['title'] ?></td>
                                                                <td><?= $sm['menu'] ?></td>
                                                                <td><?= $sm['url'] ?></td>
                                                                <td><?= $sm['icon'] ?></td>
                                                                <td><?= $sm['is_active'] ?></td>
                                                                <td>
                                                                    <a href="" data-toggle="modal" data-target=".ubahsubMenuModal" class="badge badge-success">Edit</a>
                                                                    <a href="<?= base_url(); ?>menu/hapussubmenu/<?= $sm['id']; ?>" class="badge badge-danger" class="tombol-hapus">Delete</a>
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

                <!-- Small modal -->

                <div class="modal fade subMenuModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Add New Sub Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Sub menu title" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="menu_id" id="menu_id" class="form-control">
                                            <option value="">Select menu</option>
                                            <?php foreach ($menu as $m) : ?>
                                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="url" id="url" class="form-control" placeholder="Sub menu url" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Sub menu icon" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" value="1" checked>
                                                Active?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->