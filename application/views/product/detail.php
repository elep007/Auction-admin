<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Auction</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h2><i class="fa fa-bars"></i> Auctions <small>Detail</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                          </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                  </ul>
                  <div class="clearfix"></div>
              </div>
              <div class="x_content" style="display: block;">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Auction Info</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Bid History</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Seller</a>
                          </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <!--product detail-->
                              <div class="row tile_count">
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-shopping-cart"></i> Auction Name</span>
                                      <div class="count"><?php echo $result['name']; ?></div>
                                  </div>

                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-user"></i> Current Bid</span>
                                      <div class="count"><?php echo $result['lastbid']; ?></div>
                                  </div>
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-money"></i> Current Price</span>
                                      <div class="count"><sup>$</sup><?php echo number_format((float) $result['price'], 2, '.', ','); ?></div>
                                  </div>
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-clock-o"></i> EndTime</span>
                                      <div class="count" ><?php
                                              $temp=explode(" ",$result['endtime']);
                                              echo $temp[1]; ?></div>
                                      <span class="count_bottom"><i class="green"><?php echo $temp[0]; ?> </i> </span>
                                  </div>

                              </div>
                              <!--description-->
                              <div class="message_wrapper">
                                  <h4 class="heading">Description</h4>
                                  <blockquote class="message"><?php echo $result['description']; ?></blockquote>
                                  <br>
                              </div>
                              <!--image-->
                              <h4 class="heading">Images</h4>

                              <div class="col-md-12">
                                      <?php
                                      $images=explode("_split_",$result['image']);
                                      foreach($images as $theImage){
                                      ?>
                                          <div class="col-md-3">
                                              <label  class="label thumbnail" data-toggle="tooltip" style="width: 100%; height: 230px; padding: 5px;">
                                                  <div class="view view-first" style="width: 100%; max-height:218px;" id="div-avatar-change">
                                                      <img  class="rounded img-responsive avatar-view"  name="image"
                                                           src="<?= base_url('') . 'backend/'.$theImage ?>" alt="No Image">
                                                      <div class="mask btnImagePreview" datasrc="<?= base_url('') . 'backend/'. $theImage ?>">
                                                          <p></p>
                                                          <p></p>
                                                          <p >View</p>
                                                          <p></p>
                                                          <p></p>
<!--                                                          <div class="tools tools-bottom" id="pen-avatar-change">-->
<!--                                                              <a href="#"><i class="fa fa-pencil"></i></a>-->
<!--                                                          </div>-->
                                                      </div>
                                                  </div>
<!--                                                  <input type="file" class="sr-only" id="input-admob1-change" accept="image/*" style="width: 220px">-->
                                              </label>
                                          </div>
                                          <?php
                                      }
                                      ?>
                              </div>

                              <button id="btnImagePreviewModal" type="button" class="btn btn-primary" style="display: none;" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

                              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                  <div class="modal-dialog modal-lg">
                                      <div class="modal-content">

                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                              </button>
                                              <h4 class="modal-title" id="myModalLabel">Image Preview</h4>
                                          </div>
                                          <div class="modal-body text-center">
                                              <img class="rounded img-responsive avatar-view" id="imagePreview" name="image"
                                                   src="<?= base_url('') . 'backend/'.$theImage ?>" alt="No Image">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
<!--                                              <button type="button" class="btn btn-primary">Save changes</button>-->
                                          </div>

                                      </div>
                                  </div>
                              </div>
                              <!--video-->
                              <?php if($result['isvideo']!='no'){ ?>
                              <h4 class="heading">Video</h4>
                                  <div class="view view-first" style="width: 300px;" id="div-avatar-change">
                                      <video controls width="300">

                                          <source src="<?= base_url('') .'backend/'. $result['video']; ?>"
                                                  type="video/mp4">

                                          Sorry, your browser doesn't support embedded videos.
                                      </video>
                                  </div>
                              <?php } ?>

                              <div class="ln_solid"></div>
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                      <a href="<?= base_url("product_con/all") ?>"><button type="button" class="btn btn-success">Back to list</button></a>
                                  </div>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <!--bid Count, Bid history-->
                              <div class="row tile_count">
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-user"></i> Bids</span>
                                      <div class="count"><?php echo count($bids)-1; ?></div>
<!--                                      <span class="count_bottom"><i class="green">4% </i> From last Week</span>-->
                                  </div>
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-user"></i> Current Bid</span>
                                      <div class="count"><?php $ct=count($bids); echo $bids[0]['username']; ?></div>
                                  </div>

                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-money"></i> Start Price</span>
                                      <div class="count"><sup>$</sup><?php $price=(float) $bids[$ct-1]['price']; echo number_format($price, 2, '.', ','); ?></div>
                                  </div>
                                  <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count text-center">
                                      <span class="count_top"><i class="fa fa-money"></i> Current Price</span>
                                      <div class="count"><sup>$</sup><?php echo number_format((float) $bids[0]['price'], 2, '.', ','); ?></div>
                                  </div>

                              </div>

                              <table id="datatable" class="table table-striped table-bordered delete_table_bidhistory">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Date</th>
                                      <th>Username</th>
                                      <th>Price($)</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                  if( !empty($bids) )
                                  {
                                      $i=0;
                                      foreach($bids as $result)
                                      {
                                          $i++;
                                          ?>
                                          <tr>
                                              <td><?php echo $i;?></td>
                                              <td><?php echo $result["date"];?></td>
                                              <td><?php echo $result["username"];?></td>
                                              <td><?php echo number_format((float) $result["price"], 2, '.', ''); ?></td>
                                              <td>
                                                  &nbsp;&nbsp;
                                                  <a href="javascript:void(0)"><i class="fa fa-trash history_delete" style="color:#ff7474" id="<?php echo $result["id"];?>" title="Delete History"></i> </a>
                                                  </a>
                                              </td>
                                          </tr>
                                          <?php
                                      }
                                  }
                                  ?>
                                  </tbody>
                              </table>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-3">
                                      <a href="<?= base_url("product_con/all") ?>"><button type="button" class="btn btn-success">Back to list</button></a>
                                  </div>
                              </div>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <!--  seller info-->
                              <form class="form-horizontal" id="sellerInfo" method="post" action="javascript:;">
                                  <p> </p>
                                  <h3 style="margin-bottom: 20px;">Seller Information</h3>
                                  <div class="col-md-3">
                                      <center>
                                          <?php $avatar = $seller["avatar"];?>
                                          <div class="profile_img">
                                              <label class="label thumbnail" data-toggle="tooltip" style="width: 230px; height: 230px; padding: 5px;">
                                                  <div class="view view-first" style="width: 220px;" id="div-avatar-change">
                                                      <img class="rounded img-responsive avatar-view" id="food-img" name="image"
                                                           src="<?= base_url('').'backend/'.$avatar ?>" alt="avatar">
                                                  </div>
                                              </label>
                                          </div>
                                          <p>@<?php echo $seller['username']; ?></p>
                                      </center>
                                  </div>
                                  <div class="col-md-9">
                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="user_name" class="form-control col-md-7 col-xs-12" readonly name="name" placeholder="both name(s) e.g Jon Doe" value="<?php echo $seller["name"];?>"  type="text">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="tel" id="mobile" name="mobile"  readonly data-validate-length-range="8,20" value="<?php echo $seller["mobile"];?>" class="form-control col-md-7 col-xs-12">
                                          </div>
                                      </div>

                                      <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="email" id="email" name="email"  readonly value="<?php echo $seller["email"];?>" class="form-control col-md-7 col-xs-12">
                                          </div>
                                      </div>

                                      <div class="ln_solid"></div>
                                      <div class="form-group">
                                          <div class="col-md-6 col-md-offset-3">
                                              <a href="<?= base_url("product_con/all") ?>"><button type="button" class="btn btn-success">Back to list</button></a>
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
    </div>
  </div>
</div>
<script>var canvas_pic; var is_change=0;</script>
<script>
    window.addEventListener('DOMContentLoaded', function () {      

        var avatar = document.getElementById('food-img');
        var image = document.getElementById('image');
        var input = document.getElementById('input-avatar-change');
        var $alert = $('.alert');
        var $modal = $('#modal');
        var cropper;

        $('[data-toggle="tooltip"]').tooltip();

        input.addEventListener('change', function (e) {

            // if($("#edit_profile").text()!="Save "){
            //     return false;
            // }


            var files = e.target.files;
            var done = function (url) {
                // input.value = '';
                image.src = url;
                $alert.hide();
                $modal.modal('show');
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

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 1,
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        document.getElementById('crop').addEventListener('click', function () {
            var initialAvatarURL;

            $modal.modal('hide');

            if (cropper) {
                is_change = 1;
                canvas_pic = cropper.getCroppedCanvas({
                    width: 220,
                    height: 220,
                });
                avatar.src = canvas_pic.toDataURL();
                alert(avatar.src);
                $alert.removeClass('alert-success alert-warning');
            }
        });
    });
</script>