<?php
//$image_fq_name = base_url('assets/uploads/upload_sample.jpg');
//$back_url = "#";
//$form_submit_url = "#";
?>
<div class="row">
    <div class="col-md-12">
        <img src="<?php echo $thumbnail_filename; ?>" 
             class="img-thumbnail"/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <img src="<?php echo $normal_filename; ?>" 
             class="img-thumbnail"/>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <img src="<?php echo $large_filename; ?>" 
             class="img-thumbnail"/>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <a href="<?php echo $delete_url; ?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo $back_url; ?>" class="btn btn-primary">Back</a>
    </div>
</div>


<script>
    var app = angular.module('myapp', []);
    
</script>