<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Foods</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Foods <small>All Foods</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered delete_table_food">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Restaurant</th>
                  <th>Description</th>
                  <th>Need Description</th>                  
                  <th>Action</th>
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
                              <td>
                                  &nbsp;&nbsp;
                                  <a href="<?= base_url("food_con/edit") ?>?id=<?php echo $result["id"];?>"><i class="fa fa-edit" style="color: #1ABB9C" title="Edit User"></i> </a> &nbsp;
                                  <a href="javascript:void(0)"><i class="fa fa-trash food_delete" style="color:#ff7474" id="<?php echo $result["id"];?>" title="Delete User"></i> </a>
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