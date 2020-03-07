<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Users <small>Add New Users</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <form class="form-horizontal" id="update-user-form" method="post" action="javascript:;">
              <p> </p>
              <span class="section">Update User Info</span>
              <div class="col-md-3">
                <center>
                  <?php $avatar = $result["avatar"];?>
                  <div class="profile_img">
                      <label class="label thumbnail" data-toggle="tooltip" style="width: 230px; height: 230px; padding: 5px;">
                          <div class="view view-first" style="width: 220px;" id="div-avatar-change">
                              <img class="rounded img-responsive avatar-view" id="food-img" name="image"
                                   src="<?= base_url('').'backend/'.$avatar ?>" alt="avatar">
                          </div>                          
                      </label>                      
                  </div>
                    <p>@<?php echo $result['username']; ?></p>
              </center>
              </div>
              <div class="col-md-9">
                <div class="item form-group" hidden="true">
                    <input id="user_id"  name="id" value="<?php echo $_GET['id'];?>" required="required" type="text">
                </div>
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="user_name" class="form-control col-md-7 col-xs-12" name="name" placeholder="both name(s) e.g Jon Doe" value="<?php echo $result["name"];?>" required="required" type="text">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Phone Number <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="mobile" name="mobile" required="required"  data-validate-length-range="8,20" value="<?php echo $result["mobile"];?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="email" id="email" name="email" required="required" value="<?php echo $result["email"];?>" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">password <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="userpassword" type="text" value="<?php echo $result["password"];?>" name="password" data-validate-length="6,100" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>      

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">               
                    <a href="<?= base_url("user_con/all") ?>"><button type="button" class="btn">Cancel</button></a>  
                    <button id="Update" type="submit" class="btn btn-success">Update</button>
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