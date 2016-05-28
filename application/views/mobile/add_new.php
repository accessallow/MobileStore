<?php if (isset($edit)) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm delete</h4>
                </div>
                <div class="modal-body">
                    Are you sure want to delete <strong><?php echo $mobile->title; ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo site_url('Mobile/delete/' . $mobile->id); ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
if (isset($edit)) {
    $edit = true;
} else {
    $edit = false;
}

$title = $edit ? $mobile->title : "";
$subtitle = $edit ? $mobile->subtitle : "";
$company = $edit ? $mobile->company : "";
$connectivity = $edit ? $mobile->connectivity : "";
$storage = $edit ? $mobile->storage : "";
$warranty = $edit ? trim($mobile->warranty) : "";
$mrp = $edit ? $mobile->mrp : "";
$selling_price = $edit ? $mobile->selling_price : "";
$actual_price = $edit ? $mobile->actual_price : "";
$discount_value = $edit ? $mobile->discount_value : "";
$discount_text = $edit ? $mobile->discount_text : "";

$seller_name = $edit ? $mobile->seller_name : "";
$delivery_time = $edit ? $mobile->delivery_time : "";
$delivery_charge = $edit ? $mobile->delivery_charge : "";
$cod = $edit ? $mobile->cod : "";
$replacement_policy = $edit ? $mobile->replacement_policy : "";
$delivery_text = $edit ? $mobile->delivery_text : "";


$page_title = $edit ? $mobile->title : "Add new mobile";
?>

<div class="row">
    <div class="col-lg-12">

        <h1 class="page-header"><?php echo $page_title; ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert <?php echo $this->session->flashdata('alert_class'); ?>" role="alert">
        <span class="glyphicon <?php echo $this->session->flashdata('glyphicon_class'); ?>"></span>
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
    </div>
<?php } ?>

<?php if ($edit) { ?>
    <div class="row" style="margin-bottom: 10px; ">
        <div class="col-md-12">
            <button type="button" class="btn btn-success" id="update_button">Update</button>
            <button type="button" class="btn btn-danger" id="deleteButton" data-toggle="modal" data-target="#myModal">Delete</button>
            <a href="<?php echo $back_url; ?>" class="btn btn-primary">Back</a>
        </div> 
    </div>
<?php } ?>

<form class="form-horizontal" data-parsley-validate role="form" 
      action="<?php echo $form_submit_url; ?>" 
      method="POST"
      ng-controller="MobileController"
      id="mobile_data_form"
      >
          <?php if ($edit) { ?>
        <input type="hidden" name="mobile_id" value="<?php echo $mobile->id; ?>"/>
    <?php } ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            Basic Details
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Title</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               autofocus="autofocus"
                               accesskey="v"
                               class="form-control" 
                               required name="title"
                               placeholder=""
                               value="<?php echo $title; ?>"
                               /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Subtitle</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               value="<?php echo $subtitle; ?>"
                               accesskey="v"
                               class="form-control" 
                               required name="subtitle"
                               placeholder=""/> 
                    </div>
                </div>


                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Company/Brand</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control"
                               value="<?php echo $company; ?>"
                               required 
                               name="company" 
                               placeholder=""/> 
                    </div>
                </div>



            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label  class="col-sm-4 control-label">Connectivity</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control"
                               value="<?php echo $connectivity; ?>"
                               required 
                               name="connectivity" 
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Storage</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control"
                               value="<?php echo $storage; ?>"
                               required 
                               name="storage" 
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label"> Warranty </label>
                    <div class="col-sm-8">
                        <textarea 
                            class="form-control"  
                            required
                            name="warranty" 
                            placeholder=""><?php echo $warranty; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Pricing
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name" class="col-sm-4 control-label">MRP</label>
                    <div class="col-sm-8">
                        <input type="number" 
                               class="form-control" 
                               required
                               name="mrp"
                               value="<?php echo $mrp; ?>"
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_name" class="col-sm-4 control-label">Selling Price</label>
                    <div class="col-sm-8">
                        <input type="number" 
                               class="form-control" 
                               required
                               value="<?php echo $selling_price; ?>"
                               name="selling_price"
                               placeholder=""/> 
                    </div>
                </div>


                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Actual Price</label>
                    <div class="col-sm-8">
                        <input type="number" 
                               class="form-control"
                               required 
                               value="<?php echo $actual_price; ?>"
                               name="actual_price" 
                               placeholder=""/> 
                    </div>
                </div>



            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Discount value</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control"
                               required 
                               value="<?php echo $discount_value; ?>"
                               name="discount_value" 
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Discount text</label>
                    <div class="col-sm-8">
                        <textarea 
                            class="form-control"  
                            name="discount_text" 
                            required
                            rows="3"
                            placeholder=""><?php echo $discount_text; ?></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            Seller Details
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name" class="col-sm-4 control-label">Seller Name</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control" 
                               required 
                               value="<?php echo $seller_name; ?>"
                               name="seller_name"
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_name" class="col-sm-4 control-label">Delivery time</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control" 
                               required 
                               value="<?php echo $delivery_time; ?>"
                               name="delivery_time"
                               placeholder=""/> 
                    </div>
                </div>


                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Delivery charge</label>
                    <div class="col-sm-8">
                        <input type="text" 
                               class="form-control"
                               required 
                               value="<?php echo $delivery_charge; ?>"
                               name="delivery_charge" 
                               placeholder=""/> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Cash on delivery</label>
                    <div class="col-sm-8">
                        <select  
                            class="form-control"
                            name="cash_on_delivery" 
                            placeholder=""
                            ng-model="cod"
                            > 
                            <option value="0">Not Available</option>
                            <option value="1">Available</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="product_brand" class="col-sm-4 control-label">Replacement policy</label>
                    <div class="col-sm-8">
                        <textarea 
                            class="form-control"  
                            required
                            name="replacement_policy" 
                            rows="3"
                            placeholder=""><?php echo $replacement_policy; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-4 control-label"> Delivery text </label>
                    <div class="col-sm-8">
                        <textarea 
                            class="form-control"  
                            required
                            name="delivery_text" 
                            rows="3"
                            placeholder=""><?php echo $delivery_text; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr/>
    <div class="form-group">
        <div class="col-sm-offset-0 col-sm-10">

            <input type="submit" 
                   accesskey="s"
                   class="btn btn-success" value="Save"/>
            <input type="reset" class="btn" value="Clear"/>
            <a 
                accesskey="c"
                href="<?php echo $back_url; ?>" class="btn btn-primary">Back</a>
        </div>
    </div>
</form>


<script>
    var app = angular.module('myapp', []);
    app.controller('MobileController', ['$scope', '$http', function ($scope, $http) {

            $scope.cod = <?php echo $cod; ?>;

        }]);
</script>

<script>
    $(document).ready(function () {

        $("#update_button").click(function () {
            $("#mobile_data_form").submit();
        });

    });
</script>
