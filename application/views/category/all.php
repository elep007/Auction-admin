<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Category</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Categories <small>All</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered delete_table_restaurant">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  if( !empty($categoryInfos) )
                  {
                      $i=0;
                      foreach($categoryInfos as $result)
                      {
                          $i++;
                          ?>
                          <tr>                             
                              <td><?php echo $i;?></td>
                              <td>
                                  <img class="rounded img-responsive avatar-view" id="res-img" name="image"
                                       src="<?= base_url('').'backend/'.$result["image"] ?>" alt="No image" width="60px" height="50px">
                              </td>
                              <td><?php echo $result["name"];?></td>
                              <td>
                                  &nbsp;&nbsp;
                                  <a href="<?= base_url("category_con/edit") ?>?id=<?php echo $result["id"];?>"><i class="fa fa-edit" style="color: #1ABB9C" title="Edit Category"></i> </a> &nbsp;
                                  <a href="javascript:void(0)"><i class="fa fa-trash category_delete" style="color:#ff7474" id="<?php echo $result["id"];?>" title="Delete Category"></i> </a>
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