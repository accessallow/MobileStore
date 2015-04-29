<!-------footer page starts from here ----->
<?php
$base_url = base_url();
$flot = false;
$morris_charts = false;
?>
<!-- jQuery -->


<script src='<?php echo $base_url; ?>assets/elevate-zoom/jquery.elevatezoom.js'></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>



<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>


<?php if ($flot == true) { ?>
    <!-- Flot Charts JavaScript -->

    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/js/flot-data.js"></script>
<?php } ?>

<!-- Custom Theme JavaScript -->
<script src="<?php echo $base_url; ?>assets/sb-admin2/dist/js/sb-admin-2.js"></script>

<?php if ($morris_charts == true) { ?>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/sb-admin2/js/morris-data.js"></script>
<?php } ?>



<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            responsive: true
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
            .popover()
</script>

<script>
    //initiate the plugin and pass the id of the div containing gallery images 
    $("#img_01").elevateZoom(
            {
                gallery: 'gal1',
                cursor: 'pointer',
                galleryActiveClass: 'active',
                imageCrossfade: true,
                loadingIcon: '<?php echo base_url(); ?>assets/images/spinner.gif'
            });
    //pass the images to Fancybox 
    $("#img_01").bind("click", function (e) {
        var ez = $('#img_01').data('elevateZoom');
        $.fancybox(ez.getGalleryList());
        return false;
    });
</script>

</body>

</html>
