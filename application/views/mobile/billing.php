<?php
$grand_total = 0;

if ($cart = $this->cart->contents()):
	foreach ($cart as $item):
		$grand_total = $grand_total + $item['subtotal'];
	endforeach;
endif;
?>

    <form name="billing" method="post" action="<?php echo site_url().'/billing/save_order' ?>" >
    <input type="hidden" name="command" />
	<div align="center">
        <h1 align="center">Billing Info</h1>
        <table class="table table-bordered" border="0" cellpadding="2px" style="width:600px;">
        	<tr><td>Order Total:</td><td><strong>Rs. <?php echo number_format($grand_total,2); ?></strong></td></tr>
            <tr><td>Your Name:</td><td><input type="text" name="name" /></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" /></td></tr>
            <tr><td>Email:</td><td><input type="text" name="email" /></td></tr>
            <tr><td>Phone:</td><td><input type="text" name="phone" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Place Order" /></td></tr>
        </table>
	</div>
</form>
