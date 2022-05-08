<div class="footer-wrap pd-20 mb-20 card-box">
    DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>
<!-- <script src="<?= base_url() ?>deskapp-master/src/plugins/apexcharts/apexcharts.min.js"></script> -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard.js"></script>
<!-- buttons for Export datatable -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/datatable-setting.js"></script>
</body>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>

<!-- lokasi -->
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url('lokasi/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('lokasi/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    // console.log(hasil_kota);
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });
    });
</script>
</body>

</html>