</div> <!-- closing the container opened in header -->       

<script src="<?php echo URL; ?>assets/jquery/jquery-2.1.1.min.js"></script>

<script src="<?php echo URL; ?>assets/parsley/parsley.js"></script>


<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="<?php echo URL; ?>assets/DataTables-1.10.5/media/js/jquery.dataTables.js"></script>


<script>
    $(document).ready(function () {

        $('form').parsley();

        
        $('#mytable').DataTable();

    });

</script>
</body>
</html>