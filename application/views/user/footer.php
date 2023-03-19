</div>
</div>
</header>
<!-- Content section-->
<!-- Footer-->
<!-- <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bagus Pradita</p>
        </div>
    </footer> -->




<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {

    $('#kategori').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?php echo base_url() ?>C_bagusUser/get_sub_kategori",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                html += '<option>' + '- Pilih -' + '</option>';
                for (i = 0; i < data.length; i++) {

                    html += '<option value=' + data[i].subkategori_id + '>' + data[i]
                        .subkategori + '</option>';
                }
                $('#subkategori').html(html);
                // console.log(id);
                // console.log();    

            }
        });
        return false;

    });

});
</script>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?= base_url('lp/') ?>js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?= base_url('assets/') ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/') ?>/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/') ?>js/datatables-simple-demo.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
</body>
