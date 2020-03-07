<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Special Offer</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Special offer <small>All Info</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered set_special_table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Restaurant</th>
                  <th>Description</th>
                  <th>Need Description</th>                  
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  if( !empty($foodInfos) )
                  {
                      $i=0;
                      foreach($foodInfos as $result)
                      {
                          $i++;
                          ?>
                          <tr>                             
                              <td><?php echo $i;?></td>
                              <td><?php echo $result["name"];?></td>
                              <td><?php echo $result["resname"];?></td>
                              <td><?php echo $result["description"];?></td>
                              <td><?php echo $result["needdescription"];?></td>                              
                              <td>&nbsp;&nbsp;<!-- ff7474 -->
                                  <?php if($result["status"] == "set"){?>
                                    <a href="javascript:void(0)"><i class="fa fa-edit food_unselect" style="color:#ff7474" name= "unselect" id="<?php echo $result["id"];?>" title="UnSelect"></i> </a>
                                  <?php }else{?>
                                    <a href="javascript:void(0)"><i class="fa fa-edit food_select" style="color:#1ABB9C" name= "select" id="<?php echo $result["id"];?>" title="Select"></i> </a>
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