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
                                    <p style="font-size: 12pt; color: aliceblue">Harap semua field di isi!</p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Informasi Nota
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md mb-3">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="text" value="<?= date('Y-m-d'); ?>" name="tanggal" id="tanggal" class="form-control" data-language="en" placeholder="Tanggal" required readonly />
                                                    <div class="invalid-feedback">
                                                        Tanggal Transaksi Harus di isi.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mb-1">
                                                    <label for="kasir">Kasir</label>
                                                    <input type="text" class="form-control" name="kasir" id="kasir" value="<?= $user['name'] ?>" placeholder="kasir" readonly required>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Akun
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mb-0">
                                                    <div>
                                                        <label for="no_acc">Kode Akun</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" name="id_akun" id="id_akun">
                                                        <input type="text" name="no_acc" id="no_acc" class="form-control" placeholder="Pilih Akun" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-akun">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mb-1">
                                                    <label for="nama_akun">Akun</label>
                                                    <input type="text" class="form-control" name="nama_akun" id="nama_akun" placeholder="Nama Akun" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Pelanggan
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <div>
                                                        <label for="kode_pelanggan">Kode Pelanggan</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                                                        <input type="text" name="kode_pelanggan" id="kode_pelanggan" class="form-control" placeholder="Pilih Pelanggan" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-pelanggan">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-md ">
                                                    <label for="nama_pelanggan">Nama</label>
                                                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Nama" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-7 mb-1">
                                                    <label for="alamat_pelanggan">Alamat</label>
                                                    <input type="text" class="form-control" name="alamat_pelanggan" id="alamat_pelanggan" placeholder="Alamat" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>
                                                </div>
                                                <div class="col-md mb-1">
                                                    <label for="kategori_pelanggan">Kategori</label>
                                                    <input type="text" class="form-control" name="kategori_pelanggan" id="kategori_pelanggan" placeholder="Kategori" required>
                                                    <div class="invalid-feedback">
                                                        Bidang ini Harus di isi.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Produk
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <div>
                                                        <label for="kode_produk">Kode Produk</label>
                                                    </div>
                                                    <div class="form-group input-group">
                                                        <input type="hidden" id="price">
                                                        <input type="hidden" id="hpp">
                                                        <input type="hidden" id="id_produk">
                                                        <input type="text" name="kode_produk" id="kode_produk" class="form-control" placeholder="Pilih Produk" required autofocus>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-info btn-default" data-toggle="modal" data-target=".modal-produk">
                                                                <i class="fa fa-search"></i>
                                                            </button>
                                                        </span>

                                                    </div>
                                                </div>
                                                <div class="col-md-4 ">
                                                    <label for="stock">Stock</label>
                                                    <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" autocomplete="off" required>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for="qty">Qty</label>
                                                    <input type="text" class="form-control" value="1" min="1" name="qty" id="qty" placeholder="Qty" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <button type="button" id="add_cart" class="btn btn-info btn-default float-right">Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Nomor Transaksi
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mt-3 mb-3">
                                                    <h1 class="text-center"><?= $invoice ?></h1>
                                                    <p class="text-center">Kode ini ter Generate Otomatis</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end row -->

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-transparent border-bottom">
                                            Keranjang
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Kode Produk</th>
                                                                    <th>Nama Produk</th>
                                                                    <th>Qty</th>
                                                                    <th>Harga</th>
                                                                    <th>HPP</th>
                                                                    <th>Total</th>
                                                                    <th>Laba</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="cart_table">
                                                                <?php $this->view('transaksi/cart_data') ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <label>Catatan</label>s
                                                        <div>
                                                            <textarea id="note" class="form-control" rows="3"></textarea>
                                                        </div>

                                                        <label class="mt-3">Ketarangan</label>
                                                        <p>* Apabila ada catatan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="card ">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md mt-3">
                                                    <div class="form-group">
                                                        <label>Sub Total</label>
                                                        <div>
                                                            <input id="sub_total" type="text" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md mt-3">
                                                    <div class="form-group">
                                                        <label>Diskon</label>
                                                        <div>
                                                            <input id="diskon_total" type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="card ">
                                        <div class="card-header bg-transparent border-bottom">
                                            Payment Detail
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Total :</h5>
                                                </div>
                                                <div class="col-md">
                                                    <h1>
                                                        <b>
                                                            <span id="grand_total" style="font-size: 50pt">
                                                                0
                                                            </span>
                                                        </b>
                                                    </h1>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="mt-3">
                                                        <div class="form-group">
                                                            <label>Jenis Pembayaran</label>
                                                            <select id="jenis_payment" class="form-control">
                                                                <option>- Pilih -</option>
                                                                <option value="DP">DP</option>
                                                                <option value="CREDIT">CREDIT</option>
                                                                <option value="CASH">CASH</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md mt-3">
                                                    <div class="form-group">
                                                        <label>Bayar</label>
                                                        <div>
                                                            <input id="bayar" type="text" class="form-control" placeholder="Bayar Berapa?" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-1">
                                                    <div class="form-group">
                                                        <label id="ket_payment">Kembali</label>
                                                        <div>
                                                            <input id="change" type="text" class="form-control" readonly />
                                                        </div>

                                                        <label for="tagihan">Tagihan</label>
                                                        <div>
                                                            <input id="tagihan" type="text" class="form-control" readonly />
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-1">
                                                    <div class="form-group">
                                                        <label>Laba</label>
                                                        <div>
                                                            <input id="laba_sale" type="text" class="form-control" readonly />
                                                        </div>

                                                        <label>Hpp</label>
                                                        <div>
                                                            <input id="hpp_sale" type="text" class="form-control" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            <button id="cancel_payment" type="button" class="btn btn-success waves-effect waves-light  mt-1">Cancel</button>
                                            <button type="button" id="proses_payment" class="btn btn-primary waves-effect waves-light  mt-1">Simpan</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
            </div>
            <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->

            <div class="modal fade modal-akun" id="modal-akun" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Akun Perkiraan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No Acc</th>
                                            <th>Nama Akun</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        <?php foreach ($akun as $a) { ?>
                                            <tr>
                                                <th scope="row"><?= $i ?></th>
                                                <td><?= $a['no_acc']; ?></td>
                                                <td> <?= $a['nama_akun']; ?></td>
                                                <td>
                                                    <button id="select_akun" data-id="<?= $a['id_akun']; ?>" data-kode="<?= $a['no_acc']; ?>" data-name="<?= $a['nama_akun']; ?>" class="btn btn-primary">
                                                        Pilih
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>
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

            <div class="modal fade modal-pelanggan" id="modal-pelanggan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <!-- <th>Kode Pelanggan</th> -->
                                            <th>Nama</th>
                                            <th>PIC</th>
                                            <th>Alamat</th>
                                            <th>Telepon</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pelanggan as $p) { ?>
                                            <tr>
                                                <!-- <td><?= $p['kode_pelanggan']; ?></td> -->
                                                <td><?= $p['nama_pelanggan']; ?></td>
                                                <td> <?= $p['pic_pelanggan']; ?></td>
                                                <td><?= $p['alamat_pelanggan']; ?></td>
                                                <td><?= $p['no_telp']; ?></td>
                                                <td><?= $p['id_kategori']; ?></td>
                                                <td>
                                                    <button id="select_pelanggan" data-id="<?= $p['id_pelanggan']; ?>" data-kode="<?= $p['kode_pelanggan']; ?>" data-name="<?= $p['nama_pelanggan']; ?>" data-alamat="<?= $p['alamat_pelanggan']; ?>" data-kategori="<?= $p['id_kategori']; ?>" class="btn btn-primary">
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
            <!-- MODAL ADD ITEM -->
            <div class="modal fade modal-produk" id="modal-produk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Pilih Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Kode Produk</th>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Stock</th>
                                            <th>Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($produk as $p) { ?>
                                            <tr>
                                                <td><?= $p['kode_produk']; ?></td>
                                                <td><?= $p['nama_produk']; ?></td>
                                                <td> <?= $p['nama_satuan']; ?></td>
                                                <td><?= $p['stock_produk']; ?></td>
                                                <td><?= convertRupiah($p['harga_jual']); ?></td>
                                                <td>
                                                    <button id="select_p" data-id="<?= $p['id_produk']; ?>" data-kode="<?= $p['kode_produk']; ?>" data-name="<?= $p['nama_produk']; ?>" data-hpp="<?= $p['hpp']; ?>" data-price="<?= $p['harga_jual']; ?>" data-stock="<?= $p['stock_produk']; ?>" class="btn btn-primary">
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

            <div class="modal fade modal-item-edit" id="modal-item-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Upadate data Cart</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_cart_item">
                            <div class="form-group">
                                <label for="produk_item">Produk</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" id="barcode_item" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" id="produk_item" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price_item">Harga Jual</label>
                                        <input type="number" id="price_item" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hpp_item">HPP</label>
                                        <input type="number" id="hpp_item" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="qty_item">QTY</label>
                                        <input type="number" id="qty_item" min="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="total_before">Total Sebelum Diskon</label>
                                <input type="number" id="total_before" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="diskon_item">Diskon per Produk</label>
                                <input type="number" id="diskon_item" min="0" class="form-control" readonly>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="total_item">Total after Diskon</label>
                                        <input type="number" id="total_item" min="0" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="laba_item">Laba</label>
                                        <input type="number" id="laba_item" min="0" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="pull-right">
                                <button type="button" id="edit_cart" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>