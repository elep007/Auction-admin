<style type="text/css">
  .form-control {    
    padding: 0px 10px;    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Restaurants</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Restaurants <small>Add New Restaurant</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <form class="form-horizontal" id="restaurant-change-form" method="post" action="javascript:;">
              <p> </p>
              <span class="section">New Restaurant Info</span>
              <div class="col-md-3">
                <?php 
                  $resimage = $result["image"];
                  $reslogo = $result["logo"];
                ?>
                <center>
                    <div class="restaurant_logo_img">
                        <label class="label thumbnail" data-toggle="tooltip" style="width: 230px; height: 230px; padding: 5px;">
                            <div class="view view-first" style="width: 220px;" id="div-avatar-change">
                                <img class="rounded img-responsive avatar-view" id="res-logo-img" name="image"
                                     src="<?= base_url('')."backend/".$reslogo ?>" alt="Restaurant logo">
                                <div class="mask">
                                    <p></p>
                                    <p></p>
                                    <p>Restaurant Logo</p>
                                    <p></p>
                                    <div class="tools tools-bottom" id="pen-avatar-change">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <input type="file" class="sr-only" id="input-res-logo-change" 
                                   accept="image/*" style="width: 220px">
                        </label>
                        <label class="label thumbnail" data-toggle="tooltip" style="width: 230px; height: 230px; padding: 5px;">
                            <div class="view view-first" style="width: 220px;" id="div-avatar-change">
                                <img class="rounded img-responsive avatar-view" id="res-img" name="image"
                                     src="<?= base_url('')."backend/".$resimage ?>" alt="Restaurant">
                                <div class="mask">
                                    <p></p>
                                    <p></p>
                                    <p>Restaurant Image</p>
                                    <p></p>
                                    <div class="tools tools-bottom" id="pen-avatar-change">
                                        <a href="#"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <input type="file" class="sr-only" id="input-res-change" 
                                   accept="image/*" style="width: 220px">
                        </label>                        
                        <div class="alert" role="alert"></div>

                        <div class="modal fade" id="logomodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Crop the image</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="width: 360px; height: 360px;">
                                        <div class="img-container">
                                            <img id="image" style="width: 400px; height: 360px" src="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary" id="logocrop">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
              </div>
              <div class="col-md-9">
                <div class="item form-group" hidden="true">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id">ID <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_id" class="form-control col-md-7 col-xs-12" name="user_id" value="<?php echo $_GET['id'];?>" required="required" type="text">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Restaurant Name" required="required" value="<?php echo $result["name"];?>" type="text">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="res_mobile">Phone Number <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="tel" id="res_mobile" disabled="true" name="res_mobile" required="required" data-validate-length-range="8,20" value="<?php echo $result["phone"];?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>     

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Address <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_address" class="form-control col-md-7 col-xs-12" name="name" placeholder="Restaurant Address" required="required" value="<?php echo $result["address"];?>" type="text">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Position <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_position" class="form-control col-md-7 col-xs-12" name="name" placeholder="Restaurant Position" required="required" value="<?php echo $result["position"];?>" type="text">
                  </div>
                </div>                

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="opentime">Open Time <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_opentime" class="form-control col-md-7 col-xs-12" name="opentime" placeholder="Restaurant Position" required="required" value="<?php echo $result["opentime"];?>" type="text">
                  </div>
                </div>     

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="res_pincode">PinCode <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="res_pincode" name="number" placeholder="e.g 12345678" required="required" data-validate-minmax="1000,9999" value="<?php echo $result["pin"];?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>      
               
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="res_description" class="form-control col-md-7 col-xs-12" name="name" placeholder="Restaurant description" required="required" value="<?php echo $result["description"];?>" type="text">
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <a href="<?= base_url("restaurant_con/all") ?>"><button type="button" class="btn">Cancel</button></a>                  
                    <button id="send" type="submit" class="btn btn-success">Change</button>
                  </div>
                </div>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>var canvas_pic; var is_logo_change=0; var is_img_change =0; var is_sel=0;</script>
<script>
    window.addEventListener('DOMContentLoaded', function () {      

        var reslogoimg = document.getElementById('res-logo-img');
        var resimg = document.getElementById('res-img');        
        var image = document.getElementById('image');
        var logoinput = document.getElementById('input-res-logo-change');

        var resinput = document.getElementById('input-res-change');
        var $alert = $('.alert');
        var $logomodal = $('#logomodal');
        var cropper;

        $('[data-toggle="tooltip"]').tooltip();

        logoinput.addEventListener('change', function (e) {
            is_sel=0;
            var files = e.target.files;
            var done = function (url) {
                // input.value = '';
                image.src = url;
                $alert.hide();
                $logomodal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        resinput.addEventListener('change', function (e) {
          is_sel=1;
            var files = e.target.files;
            var done = function (url) {
                // input.value = '';
                image.src = url;
                $alert.hide();
                $logomodal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $logomodal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        document.getElementById('logocrop').addEventListener('click', function () {
            var initialAvatarURL;

            $logomodal.modal('hide');

            if (cropper) {
              if(is_sel==0){
                is_logo_change = 1;
                canvas_pic = cropper.getCroppedCanvas({
                    width: 220,
                    height: 220,
                });
                reslogoimg.src = canvas_pic.toDataURL();
                alert(reslogoimg.src);
                $alert.removeClass('alert-success alert-warning');
              }
              if(is_sel==1){
                is_img_change = 1;
                canvas_pic = cropper.getCroppedCanvas({
                    width: 220,
                    height: 220,
                });
                resimg.src = canvas_pic.toDataURL();
                alert(reslogoimg.src);
                $alert.removeClass('alert-success alert-warning');
              }
                
            }
        });
    });
</script>