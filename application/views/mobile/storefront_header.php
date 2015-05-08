<div class="container-fluid">
    <div class="row" style="background: #337ab7;">
        <div class="col-md-3">
            <p style="
               margin-left: 30px; 
               color:white;
               font-size: 3em;
               font-weight: bold;
               padding-top: 10px;
               ">
                Mobile Store
            </p>
        </div>
        <div class="col-md-9">
            <!-- Single button -->
            <div class="btn-group pull-right" style="margin-top: 10px;">
                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="glyphicon glyphicon-shopping-cart"></span> &nbsp;Cart <span class="badge"> <?php echo $cart_items; ?> </span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo site_url('Mobile/store_catalogue'); ?>"><span class="glyphicon glyphicon-user"></span>Store Front</a></li>
                     <li><a href="<?php echo site_url('Mobile/all_mobiles'); ?>"><span class="glyphicon glyphicon-user"></span>Store Admin Panel</a></li>
                    <li><a href="<?php echo site_url('Mobile/store_search'); ?>"><span class="glyphicon glyphicon-cog"></span>Search</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Login/Register</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('Mobile/view_my_cart'); ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row" style="background: #FF6868; height: 10px;">

    </div>
</div>