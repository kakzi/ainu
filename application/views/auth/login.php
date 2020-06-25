    <body class="bg-primary bg-pattern">

        <div class="home-btn d-none d-sm-block">
            <a href="<?= base_url('home') ?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-3 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center mb-4">
                                                <a href="#" class="logo"><img src="<?= base_url(); ?>assets/images/logo-sm-dark.png" height="100" alt="logo"></a>
                                                <!-- <h5 class="mt-5 text-center">Masuk</h5> -->
                                            </div>
                                        </div>
                                    </div>

                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="form-horizontal" method="post" action="<?= base_url('auth'); ?>">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="username" autofocus autocomplete="off" required name="username">
                                                    <label for="username">Username</label>
                                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" id="password" name='password' required>
                                                    <label for="password">Password</label>
                                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>

                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Masuk</button>
                                                </div>

                                                <!-- <div class="mt-4 text-center">
                                                    <a href="<?= base_url('auth/register') ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Buat Akun?</a>
                                                </div> -->

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>