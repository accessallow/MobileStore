<div class="container">
    <br/>
    <div class="row" style="">
        <div class="col-md-12">
            <h3>Your shopping cart</h3>
            <hr/>

            <?php echo form_open('path/to/controller/update/function'); ?>

            <table class="table table-hover table-striped" cellpadding="6" cellspacing="1" style="width:100%" border="0">
                <thead>
                <tr>
                    <th>QTY</th>
                    <th>Item Description</th>
                    <th style="text-align:right">Item Price</th>
                    <th style="text-align:right">Sub-Total</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>

                    <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                    <tr>
                        <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                        <td>
                            <?php echo $items['name']; ?>

                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                    <?php endforeach; ?>
                                </p>

                            <?php endif; ?>

                        </td>
                        <td style="text-align:right">Rs. <?php echo $this->cart->format_number($items['price']); ?>/-</td>
                        <td style="text-align:right">Rs. <?php echo $this->cart->format_number($items['subtotal']); ?>/-</td>
                    </tr>

                    <?php $i++; ?>

                <?php endforeach; ?>

               
                </tbody>
            </table>
            <div class="row pull-right">
                <div class="col-md-12">
                    <span style="font-size: 1.5em;">
                        <strong>Total &nbsp;</strong> 
                    </span>
                    <span style="font-size: 2em;">
                        Rs <?php echo $this->cart->format_number($this->cart->total()); ?>/-
                    </span>
                </div>
            </div>
            <br/>
            <p>
                <input type="submit" value="Update your cart" class="btn btn-warning"/>
                <a href="<?php echo site_url('Mobile/clear_cart'); ?>" class="btn btn-danger">Clear cart</a>
                <input type="submit" value="Checkout" class="btn btn-success"/>
            </p>

        </div>
    </div>

</div>