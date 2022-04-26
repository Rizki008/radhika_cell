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
<script src="<?= base_url() ?>deskapp-master/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard.js"></script>

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
</body>

</html>