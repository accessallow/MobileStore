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
<div class="container">
    <br/>
    <?php foreach ($mobiles as $m) { ?>
        <div class="row well">
            <div class="col-md-1">
                <?php
                $image_path = $image_path = base_url() . 'assets/uploads/no_image.jpg';
                if ($m->ownUploadsList != null) {
                    
                    foreach ($m->ownUploadsList as $u) {
                        $image_path = base_url() . 'assets/uploads/' . $u->thumbnail_filename;
                        break;
                    }
                    ?>
                    <img src="<?php echo $image_path; ?>"/>
                <?php } else { ?>
                    <img src="<?php echo $image_path; ?>" style="width:60px;margin-top: 20px;"/>
                <?php } ?>
            </div>
            <div class="col-md-8">


                <h4><?php echo $m->title; ?> <small><?php echo $m->subtitle; ?></small></h4>
                <span class="badge"><?php echo $m->company; ?></span>
                <span class="badge">Storage : <?php echo $m->storage; ?></span>
                <span class="badge">Connectivity : <?php echo $m->connectivity; ?></span>
                

            </div>
            <div class="col-md-2 pull-right">
                <p style="font-size: 2em; font-weight: bold;">Rs <?php echo $m->actual_price; ?>/-</p>
                <p class="badge"><?php echo $m->discount_value; ?></p>
                <p>
                    <a href="<?php echo site_url('Mobile/store/'.$m->id); ?>" class="btn btn-primary btn-xs">View</a>
                    <a href="<?php echo site_url('Mobile/add_to_cart/'.$m->id); ?>" class="btn btn-warning btn-xs">Add to cart</a>
                </p>
            </div>
        </div>
    <?php } ?>
</div>