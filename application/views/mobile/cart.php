<script>
    function clear_cart() {
        var result = confirm('Are you sure want to clear all bookings?');

        if (result) {
            window.location = "<?php echo site_url(); ?>/cart/remove/all";
        } else {
            return false; // cancel button
        }
    }
</script>

<div class="container">
    <br/>
    <div class="row" style="">
        <div style="margin:0px auto; width:auto;" >
            <div style="padding-bottom:10px">
                <h1 align="center">Your Shopping Cart</h1>
                <input type="button" class="btn btn-warning" value="Continue Shopping" onclick="window.location = 'Mobile/store_catalogue'" />
            </div>
            <div style="color:#F00"><?php echo $message ?></div>
            <table class="table table-hover table-bordered" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="100%">
                <?php if ($cart = $this->cart->contents()): ?>
                    <tr bgcolor="#FFFFFF" style="font-weight:bold">
                        <td style="">Serial</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Amount</td>
                        <td>Options</td>
                    </tr>
                    <?php
                    echo form_open('cart/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr bgcolor="#FFFFFF">
                            <td>
        <?php echo $i++; ?>
                            </td>
                            <td>
        <?php echo $item['name']; ?>
                            </td>
                            <td>
                                Rs.  <?php echo number_format($item['price'], 2); ?>
                            </td>
                            <td>
                            <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
                            </td>
        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>
                                Rs.  <?php echo number_format($item['subtotal'], 2) ?>
                            </td>
                            <td>
                            <?php echo anchor('cart/remove/' . $item['rowid'], 'Cancel'); ?>
                            </td>
    <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td style=""><b>Order Total: Rs. <?php echo number_format($grand_total, 2); ?></b></td>
                        <td colspan="5" align="right">
                            <input type="button" class="btn  btn-danger" value="Clear Cart" onclick="clear_cart()">
                            <input type="submit" class="btn  btn-warning" value="Update Cart">
    <?php echo form_close(); ?>
                            <input type="button" class="btn  btn-success"  value="Place Order" onclick="window.location = 'billing'"></td>
                    </tr>
<?php endif; ?>
            </table>
        </div>
    </div>

</div>