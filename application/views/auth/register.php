<body class="bg-primary bg-pattern">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">


            <div class="row justify-content-center">
                <div class="col-xl-4 col-sm-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="p-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center mb-4">
                                            <a href="#" class="logo"><img src="<?= base_url(); ?>assets/images/logo-sm-dark.png" height="50" alt="logo"></a>
                                            <h5 class="mb-3 text-center">Register Account</h5>
                                        </div>
                                    </div>
                                </div>

                                <form class="form-horizontal" method="post" action="<?= base_url('auth/register') ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="text" class="form-control" name="name" id="name" required>
                                                <label for="name">Nama Lengkap</label>
                                            </div>
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="text" class="form-control" name="username" id="username" required>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control" name="password1" id="password1" required>
                                                <label for="userpassword1">Password</label>
                                            </div>
                                            <div class="form-group form-group-custom mb-4">
                                                <input type="password" class="form-control" name="password2" id="password2" required>
                                                <label for="userpassword2">Repeat Password</label>
                                            </div>
                                            <div class="mt-4">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Daftar</button>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <a href="<?= base_url('auth') ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Sudah punya Akun? Masuk disini</a>
                                            </div>
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
    <!-- end Account pages -->