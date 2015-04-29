<!DOCTYPE html>
<html lang="en"  ng-app="myapp">
    <?php $base_url = base_url(); ?>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <style type="text/css">
            /*set a border on the images to prevent shifting*/
            #gallery_01 img{border:2px solid white;} 
            /*Change the colour*/ 
            .active img{border:2px solid #333 !important;} 
        </style>

        <title><?php echo MegaTitle; ?></title>


        <script src="<?php echo $base_url; ?>assets/sb-admin2/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="<?php echo URL; ?>assets/angularjs/angular.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/DataTables-1.10.5/media/css/jquery.dataTables.css">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">



        <!-- Social Buttons CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


        <!-- Morris Charts CSS -->
        <link href="<?php echo $base_url; ?>assets/sb-admin2/bower_components/morrisjs/morris.css" rel="stylesheet">

        <link href="<?php echo $base_url; ?>assets/mystyles/style.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>assets/mystyles/print.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <!-------header page ends  here ----->
