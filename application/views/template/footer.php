<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?= date('Y') ?> © Sistem Air Minum NU
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-nonDe d-sm-block">
                    Made with <i class="mdi mdi-heart text-danger"></i> by Santri Developer
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->

<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url(); ?>assets/vendor/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

<script src="<?= base_url(); ?>assets/js/unicons/bundle.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.all.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/libs/sweetalert/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url(); ?>assets/js/ainu.js"></script>


<script src="<?= base_url(); ?>assets/js/app.js"></script>


<!-- Spectrum colorpicker -->
<script src="<?= base_url(); ?>assets/libs/spectrum-colorpicker/spectrum.js"></script>

<!-- Selectize -->
<script src="<?= base_url(); ?>assets/libs/selectize/js/standalone/selectize.min.js"></script>

<!-- datepicker -->
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

<script src="<?= base_url(); ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

<!-- Form Advanced init -->
<script src="<?= base_url(); ?>assets/js/pages/form-advanced.init.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>

<script src="<?= base_url(); ?>assets/js/app.js"></script>

<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess') ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        })
    });

    $(document).ready(function() {

        $(document).on('click', '#select', function() {
            var id_produk = $(this).data('id');
            var kode_produk = $(this).data('kode');
            var nama_produk = $(this).data('name');
            var nama_satuan = $(this).data('satuan');
            var stock = $(this).data('stock');
            $('#id_produk').val(id_produk);
            $('#kode_produk').val(kode_produk);
            $('#nama_produk').val(nama_produk);
            $('#id_satuan').val(nama_satuan);
            $('#stock').val(stock);
            $('#modal-produk').modal('hide');
        })

        $(document).on('click', '#select_header', function() {
            var id_header = $(this).data('id');
            var no_reff = $(this).data('noreff');
            var nama_header = $(this).data('name');

            $('#id_header').val(id_header);
            $('#no_reff').val(no_reff);
            $('#nama_header').val(nama_header);
            $('#headerModal').modal('hide');
        })
    })
</script>

</body>

</html>