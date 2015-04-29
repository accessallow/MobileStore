
<div class="container">
    <div class="row">
        <div class="col-md-5">

            <div class="row" style="text-align: center; margin-top: 40px;">
               <?php if($images!=null){?>
                <div class="row">
                    <?php
                    $img = null;
                    foreach ($images as $i) {
                        $img = $i;
                        break;
                    }
                    ?>
                    <?php $url = base_url() . 'assets/uploads/'; ?>
                    <img id="img_01" src="<?php echo $url; ?><?php echo $img->normal_filename; ?>" 
                         data-zoom-image="<?php echo $url; ?><?php echo $img->large_filename; ?>"
                         style="margin-left: -30px;"
                         /> 
                </div>
               <?php } ?>
                <div class="row">
                    <div id="gal1" style="margin-top: 20px;"> 
                        <?php foreach ($images as $i) { ?>
                            <a href="#" 
                               data-image="<?php echo $url; ?><?php echo $i->normal_filename; ?>" 
                               data-zoom-image="<?php echo $url; ?><?php echo $i->large_filename; ?>"> 
                                <img id="img_01" src="<?php echo $url; ?><?php echo $i->thumbnail_filename; ?>" />
                            </a> 
                        <?php } ?>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <h2><?php echo $mobile->title; ?></h2>
                <h5 style="color: #265a88;">
                    (<?php echo $mobile->subtitle; ?>)
                </h5>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Features</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <?php foreach ($star_features as $f) { ?>
                                    <li><?php echo $f->feature_text; ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Colors</h3>
                        </div>
                        <div class="panel-body">

                            <a class="badge" href="#">Black</a>
                            <a class="badge" href="#">White</a>


                        </div>

                    </div>

                </div>
                <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Warranty</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $mobile->warranty; ?>
                        </div>

                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Connectivity</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $mobile->connectivity; ?>
                        </div>

                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Storage</h3>
                        </div>
                        <div class="panel-body">
                            <?php echo $mobile->storage; ?>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row" 
                 style="
                 text-align: center;
                 background: linear-gradient(top,#fff,#f1f5f8); 
                 padding: 10px;
                 border-radius: .4em;
                 border:solid #337ab7 1px;
                 box-shadow: inset 0 8px 10px -7px #e4e4e4;
                 ">
                <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                Check Availability at 
                <input type="text"/> 
                <button class="btn btn-primary">CHECK</button>
            </div>
            <hr/>
            <br/>
            <div class="row">
                <div class="col-md-6" >



                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pricing</h3>
                        </div>
                        <div class="panel-body">

                            <p style=" text-decoration: line-through;">MRP: Rs. <?php echo $mobile->mrp; ?> </p>
                            <p style=" text-decoration: line-through;">Selling Price: Rs. <?php echo $mobile->selling_price; ?></p>
                            <p style="font-weight: bold;font-size: 2em;">Rs. <?php echo $mobile->actual_price; ?> <span class="badge"><?php echo $mobile->discount_value; ?></span><p>
                            <p style="color: #095c05"><?php echo $mobile->discount_text; ?>
                                <?php if ($mobile->delivery_charge == 0) { ?>
                                    <span class="badge" style="background: #008200;">Free delivery</span>
                                <?php } else { ?>
                                    <span class="badge" style="background: #337ab7;">Delivery charge Rs <?php echo $mobile->delivery_charge; ?>/-</span>
                                <?php } ?>
                            </p>
                            <p>
                                <a class="btn btn-warning" href="<?php echo site_url('Mobile/add_to_cart/'.$mobile->id); ?>">Add to cart</a>
                                <a class="btn btn-success">Buy now</a>
                            </p>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sold by</h3>
                        </div>
                        <div class="panel-body">

                            <p style="font-size: 1.5em;"><?php echo $mobile->seller_name; ?></p>

                            <p>
                                <strong>Delivered in :</strong>
                                <?php echo $mobile->delivery_time; ?>
                                <?php if ($mobile->delivery_charge == 0) { ?>
                                    <span class="badge">FREE</span>
                                <?php } ?>
                            </p>
                            <p>
                                <strong>Cash on delivery  : </strong>
                                <?php
                                $cod = ($mobile->cod == 1) ? 'Available' : 'Not available';
                                ?>
                                <span class="badge" style="background: #008200;"><?php echo $cod; ?></span>
                            </p>
                            <p>         <?php echo $mobile->replacement_policy; ?>
                            </p>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="row">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Key Features</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <?php foreach ($star_features as $f) { ?>
                        <li><?php echo $f->feature_text; ?></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">

        <?php
        $category_array = array(
            1 => 'GENERAL',
            2 => 'STORAGE',
            3 => 'MEMORY',
            4 => 'CAMERA',
            5 => 'MULTIMEDIA',
            6 => 'WARRANTY',
            7 => 'DISPLAY',
            8 => 'INTERNET CONNECTIVITY',
            9 => 'BATTERY',
            10 => 'NAVIGATION',
            11 => 'CONNECTIVITY',
            12 => 'PLATFORM',
        );
        ?>
        <?php if ($specifications != null) { ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Specifications</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <tbody>

                            <?php foreach ($specifications as $key => $data) { ?>
                                <tr style="background: #e4e4e4;font-weight: bold;"><td colspan="3"><?php echo $category_array[$key]; ?></td></tr>
                                    <?php foreach ($data as $s_name => $s_values) { ?>
                                    <tr>
                                        <td><?php echo $s_name ?></td>
                                        <td><?php echo $s_values['spec_value']; ?></td>

                                    </tr>
                                <?php } ?>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        <?php } ?>
    </div>
</div>