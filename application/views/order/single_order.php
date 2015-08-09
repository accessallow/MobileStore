<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Order # <?php echo $order->id; ?></h1>

    </div>
</div>

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert <?php echo $this->session->flashdata('alert_class'); ?>" role="alert" style="margin-top: 5px;">
        <span class="glyphicon <?php echo $this->session->flashdata('glyphicon_class'); ?>"></span>
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
    </div>
<?php } ?>

<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <tr>
                <td>Customer name</td>
                <td><?php echo $order->customer_name; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $order->email; ?></td>
            </tr>
            <tr>
                <td>Shipping address</td>
                <td><?php echo $order->shipping_address; ?></td>
            </tr>
            <tr>
                <td>Total Order amount</td>
                <td><span style="font-weight: bold;">Rs. <?php echo $order->total_amount; ?>/- </span></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <span class="badge" style="background: <?php echo $order->status == 1 ? '#009900' : 'tomato'; ?>">
                        <?php echo $order->status == 1 ? 'Complete' : 'Pending'; ?>
                    </span>

                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="<?php echo site_url('Order/update_order_status/' . $order->id . '/1'); ?>" class="btn btn-success">Complete order</a>
                </td>
            </tr>
        </table>

    </div>
</div>




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
            <td>Product Id</td>
            <td>Product</td>
            <td>Quantity</td>
            <td>Price</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($products as $p) {?>
        <tr>
            <td><?php echo $p->id; ?></td>
            <td><?php echo $p->title; ?></td>
            <td><?php echo $p->quantity; ?></td>
            <td><?php echo $p->price; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>



<script>
    var app = angular.module('myapp', []);

</script>
