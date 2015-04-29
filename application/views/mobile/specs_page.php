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
<!--Model1-->
<div ng-controller="SpecsController">
    <?php if (isset($edit)) { ?>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add new star feature</h4>
                    </div>
                    <form action="<?php echo $add_star_feature_url; ?>" method="post" class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group" style="text-align: center;">
                                <label class="col-sm-2 control-label">Feature</label>
                                <div class="col-sm-10">
                                    <input type="text" 
                                           class="form-control" 
                                           required name="new_feature"
                                           placeholder=""
                                           /> 
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success" value="Save"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!--Model2-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new specification</h4>
                </div>
                <form class="form-horizontal" action="<?php echo $add_specs_url; ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="exampleInputName2" class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-8">
                                        <select  class="form-control" 
                                                 name="spec_category">
                                            <option value="1">GENERAL</option>
                                            <option value="2">STORAGE</option>
                                            <option value="3">MEMORY</option>
                                            <option value="4">CAMERA</option>
                                            <option value="5">MULTIMEDIA</option>
                                            <option value="6">WARRANTY</option>
                                            <option value="7">DISPLAY</option>
                                            <option value="8">INTERNET CONNECTIVITY</option>
                                            <option value="9">BATTERY</option>
                                            <option value="10">NAVIGATION</option>
                                            <option value="11">CONNECTIVITY</option>
                                            <option value="12">PLATFORM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="product_brand" class="col-sm-2 control-label">Specification</label>
                                    <div class="col-sm-8">
                                        <input type="text" 
                                               class="form-control"
                                               value=""
                                               required 
                                               name="spec_name" 
                                               placeholder=""/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product_brand" class="col-sm-2 control-label">Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" 
                                               class="form-control"
                                               value=""
                                               required 
                                               name="spec_value" 
                                               placeholder=""/> 
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Model3-->
    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add new image</h4>
                </div>
                <?php
                echo form_open_multipart('FileUpload/upload_new', array(
                    'class' => 'form-horizontal',
                    'data-parsley-validate' => true
                ));
                ?>

                <input type="hidden" name="attachment_id" value="<?php echo $mobile->id; ?>"/> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="product_description" class="col-md-3 control-label">Thumbnail File</label>
                                <div class="col-md-8">
                                    <input type='file' name='img_thumbnail' size="20" class="control-label" required
                                           style="width:100%;padding: 5px;"
                                           />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_description" class="col-md-3 control-label">Normal File</label>
                                <div class="col-md-8">
                                    <input type='file' name='img_normal' size="20" class="control-label" required
                                           style="width:100%;padding: 5px;"
                                           />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_description" class="col-md-3 control-label">Large File</label>
                                <div class="col-md-8">
                                    <input type='file' name='img_large' size="20" class="control-label" required
                                           style="width:100%;padding: 5px;"
                                           />
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Specifications for <?php echo $mobile->title; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert <?php echo $this->session->flashdata('alert_class'); ?>" role="alert">
            <span class="glyphicon <?php echo $this->session->flashdata('glyphicon_class'); ?>"></span>
            <strong><?php echo $this->session->flashdata('message'); ?></strong>
        </div>
    <?php } ?>

    <div class="row">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Key Features
                        </a>
                        <a href="" class="btn btn-warning btn-xs pull-right"
                           data-toggle="modal" data-target="#myModal"
                           >
                            Add new
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <table class="table table-hover table-striped">
                            <tbody>
                                <?php foreach ($star_features as $f) { ?>
                                    <tr>
                                        <td class="col-md-1">
                                            <?php echo $f->feature_text; ?>
                                        </td> 
                                        <td class="col-md-1" style="text-align: right;">
                                            <a href="<?php echo $delete_star_feature_url . '/' . $f->id; ?>" 
                                               class="btn btn-danger btn-xs">
                                                <span class="fa fa-trash-o"></span>
                                            </a>


                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Technical Specifications
                        </a>
                        <a href="" class="btn btn-warning btn-xs pull-right"
                           data-toggle="modal" data-target="#addModal"
                           >
                            Add new
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">

                        <table class="table table-bordered table-striped">
                            <tbody>
                                <?php if ($specifications != null) { ?>
                                    <?php foreach ($specifications as $key => $data) { ?>
                                        <tr style="background: #e4e4e4;font-weight: bold;"><td colspan="3"><?php echo $category_array[$key]; ?></td></tr>
                                        <?php foreach ($data as $s_name => $s_values) { ?>
                                            <tr>
                                                <td><?php echo $s_name ?></td>
                                                <td><?php echo $s_values['spec_value']; ?></td>
                                                <td><a href="<?php echo $delete_spec_url . '/' . $s_values['id']; ?>" class="btn btn-danger btn-xs">
                                                        <span class="fa fa-trash-o"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php //      echo '<pre>';                  echo var_dump($specifications); ?>

                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Images
                        </a>
                        <a href="" class="btn btn-warning btn-xs pull-right"
                           data-toggle="modal" data-target="#addImageModal"
                           >
                            Add new
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <?php
                        $upload_base = base_url() . 'assets/uploads/';
                        ?>
                        <?php foreach ($uploads as $u) { ?>
                            <div 
                                
                                class="col-md-2" style="text-align: center;margin-bottom: 15px;">
                                <img ng-src="<?php echo $upload_base.$u->thumbnail_filename; ?>" 
                                     class="img-thumbnail"
                                     style="width: 150px;height:100px;margin-bottom: 5px;"
                                     />
                                <br/>
                                <a 
                                    href="<?php echo site_url('FileUpload/single/'.$mobile->id.'/'.$u->id); ?>" 
                                    class="btn btn-info btn-xs"
                                    style="margin-top:-190px;margin-left:110px;"
                                    >V</a>

                                <a href="<?php echo site_url('FileUpload/delete/'.$mobile->id.'/'.$u->id); ?>" class="btn btn-danger btn-xs"
                                   style="margin-top:-138px;margin-left:-24px;"
                                   >D</a>        

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<script>
    var app = angular.module('myapp', []);
    app.controller('SpecsController', ['$scope', '$http', function ($scope, $http) {

            $scope.showEditModel = function (mobile_id, feature_id) {
                //alert("You just clicked to edit feature no "+feature_id +" of mobile no "+mobile_id);
                $('#myModal').modal();
            }

        }]);
</script>

<script>
    $(document).ready(function () {

        $("#update_button").click(function () {
            $("#mobile_data_form").submit();
        });

    });
</script>
