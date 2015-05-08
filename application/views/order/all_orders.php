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
            Add new order
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
            <td>Order Id</td>
            <td>Customer</td>
            <td>Email</td>
            <td>Shipping Address</td>
            <td>Phone</td>
            <td>Total Amount</td>
            <td>Status</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($orders as $m) { ?>
            <tr>
                <td>
                    <a href="<?php echo site_url('Order/single/' . $m->id); ?>">
                        <?php echo $m->id; ?>
                    </a>
                    <span class="pull-right">
                        <a href="<?php echo site_url('Order/store/' . $m->id); ?>"
                           class="" 
                           data-toggle="tooltip" 
                           data-placement="right" 
                           title="Invoice for order#<?php echo $m->id; ?>">
                            <span class="fa fa-file-o" style="font-size: 1.4em;margin-right: 5px;"></span>
                        </a>
                        <a href="<?php echo site_url('Mobile/specifications/' . $m->id); ?>"
                           class="" 
                           data-toggle="tooltip" 
                           data-placement="right" 
                           title="Specifications for order#<?php echo $m->id; ?>">
                            <span class="fa fa-cogs" style="font-size: 1.4em;"></span>
                        </a>
                    </span>

                </td>
                <td><?php echo $m->customer_name; ?></td>
                <td><?php echo $m->email; ?></td>
                <td><?php echo $m->shipping_address; ?></td>
                <td><?php echo $m->phone_number; ?></td>
                <td><?php echo $m->total_amount; ?></td>
                
                <td><?php echo $m->status; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>



<script>
    var app = angular.module('myapp', []);
    
</script>
