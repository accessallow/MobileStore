<!DOCTYPE html>
<html ng-app="myapp">
    <head>
        <meta charset="UTF-8">
        <title><?php echo MegaTitle; ?></title>
        <script src="<?php echo URL; ?>assets/angularjs/angular.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.min.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mystyles/style.css" />
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/mystyles/print.css" media="print"/>
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/DataTables-1.10.5/media/css/jquery.dataTables.css">
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><?php echo MegaTitle; ?></a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">
                       

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Mobiles 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a accesskey="q" href="<?php echo URL_X . 'Product/'; ?>">List all mobiles - q</a></li>
                                <li><a accesskey="w" href="<?php echo URL_X . 'Product/add_new'; ?>">Add new mobile - w</a></li>  
                                <li class="divider"></li>
                                <li><a accesskey="r" href="<?php echo URL_X . 'Product_category/'; ?>">Categories - r</a></li>
                                <li><a accesskey="t" href="<?php echo URL_X . 'Product_category/add_new'; ?>">Add new category - t</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php if (isset($activation_status)) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if ($counter < 50) {
                                $counter_class = 'btn-danger';
                            } else {
                                $counter_class = 'btn-success';
                            }

                            if ($activation_status == true) {
                                $activation_class = "btn-success";
                                $activation_label = "Activated";
                            } else {
                                $activation_class = "btn-danger";
                                $activation_label = "Not activated";
                            }

                            $counter_percentage = round((100 * $counter / 3000), 2);
                            ?>
                            <li>
                                <a href="<?php echo site_url('Activation'); ?>" >
                                    <span class="badge <?php echo $activation_class; ?>">
                                        <?php echo $activation_label; ?>
                                    </span>

                                    <span class="badge <?php echo $counter_class; ?>">
                                        Usage battery: <?php echo $counter_percentage; ?>%
                                    </span>

                                </a>
                            </li>

                        </ul>
                    <?php } ?>


                </div>
            </div><!-- End of its container-fluid-->
        </nav>

        <div class="container">