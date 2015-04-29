<div class="container">
    <br/>
    <div class="row well" style="background: #e4e4e4;">
        <form class="form-inline"action="<?php echo $form_submit_url; ?>" method="post">
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group">

                        <input type="text" 
                               class="form-control" 
                               style="width: 500px;"
                               name="search_term"
                               placeholder="Search a product,category or brand">
                        <input type="submit" class="btn btn-warning" value="Search"/>
                    </div>
                </div>
<!--                <div class="col-md-5">
                    <div class="form-group ">
                        <label for="exampleInputName2">Filter</label>
                        <input type="number" 
                               class="form-control" 
                               style="width:110px;"
                               name="min_price"
                               placeholder="Minimum">
                        <input type="number" 
                               class="form-control" 
                               style="width:110px;"
                               name="max_price"
                               placeholder="Maximum">
                        <input type="submit" class="btn btn-warning" value="Search"/>
                    </div>
                </div>-->
            </div>
        </form>
    </div>
    <div class="row">
        <?php if (isset($mobiles)) { ?>
            <ul class="list-group">
                <?php foreach ($mobiles as $m) { ?>
                    <li class="list-group-item">
                        <a href="<?php echo site_url('Mobile/store/'.$m->id);?>">
                        <?php echo $m->title; ?>
                        </a>
                    </li>
                    <?php } ?>
            </ul>
        <?php }else{ ?>
        <p>
            No search Items...
        </p>
        <?php } ?>
    </div>
</div>