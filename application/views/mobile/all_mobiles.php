<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">All mobiles</h1>

    </div>
</div>
<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-12">
        <a style=""
           href="<?php echo $add_new_url; ?>" 
           class="btn btn-success btn-xs pull-right">
            Add new mobile
        </a>
    </div>
</div>


<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert <?php echo $this->session->flashdata('alert_class'); ?>" role="alert" style="margin-top: 5px;">
        <span class="glyphicon <?php echo $this->session->flashdata('glyphicon_class'); ?>"></span>
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
    </div>
<?php } ?>

<hr/>
<?php
$cod = array(
    '0' => 'No',
    '1' => "Yes"
);
?>
<table class="table table-bordered table-striped table-hover" id="datatable">
    <thead>
        <tr>
            <td>Mobile</td>
            <td>Company</td>
            <td>Connectivity</td>
            <td>Storage</td>
            <td>Actual Price</td>
            <td>Seller</td>
            <td>COD</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($mobiles as $m) { ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('Mobile/single/' . $m->id); ?>">
                        <?php echo $m->title; ?>
                    </a>
                    <span class="pull-right">
                        <a href="<?php echo site_url('Mobile/store/' . $m->id); ?>"
                           class="" 
                           data-toggle="tooltip" 
                           data-placement="right" 
                           title="Front page for <?php echo $m->title; ?>">
                            <span class="fa fa-mobile" style="font-size: 2em;margin-right: 5px;"></span>
                        </a>
                        <a href="<?php echo site_url('Mobile/specifications/' . $m->id); ?>"
                           class="" 
                           data-toggle="tooltip" 
                           data-placement="right" 
                           title="Specifications for <?php echo $m->title; ?>">
                            <span class="fa fa-cogs" style="font-size: 1.4em;"></span>
                        </a>
                    </span>

                </td>
                <td><?php echo $m->company; ?></td>
                <td><?php echo $m->connectivity; ?></td>
                <td><?php echo $m->storage; ?></td>
                <td><?php echo $m->actual_price; ?></td>
                <td><?php echo $m->seller_name; ?></td>
                
                <td><?php echo $cod[$m->cod]; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<script>
    var app = angular.module('myapp', []);
    app.controller('ProductController', ['$scope', '$http', function ($scope, $http) {


        }]);
</script>
