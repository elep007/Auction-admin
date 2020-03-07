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
            <h2>Users <small>All Users</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered set_subadmin_table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Password</th>                  
                  <th>Phone</th>
                  <th>Set Allow</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  if( !empty($adminInfo) )
                  {
                      $i=0;
                      foreach($adminInfo as $result)
                      {
                          $i++;
                          ?>
                          <tr>                             
                              <td><?php echo $i;?></td>
                              <td><?php echo $result["user_name"];?></td>
                              <td><?php echo $result["email"];?></td>
                              <td><?php echo $result["full_name"];?></td>
                              <td><?php echo $result["password"];?></td>
                              <td><?php echo $result["phone_number"];?></td>                              
                              <td>&nbsp;&nbsp;<!-- ff7474 -->
                                  <?php if($result["allow_status"] == "1"){?>
                                    <a href="javascript:void(0)"><i class="fa fa-edit admin_unselect" style="color:#ff7474" name= "unselect" id="<?php echo $result["id"];?>" title="UnSelect"></i> </a>
                                  <?php }else{?>
                                    <a href="javascript:void(0)"><i class="fa fa-edit admin_select" style="color:#1ABB9C" name= "select" id="<?php echo $result["id"];?>" title="Select"></i> </a>
                                  <?php }?>
                                  
                                 
                                  </a>
                              </td>
                          </tr>
                          <?php
                      }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>