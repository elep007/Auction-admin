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
            <h2>Products <small> All</small></h2>                    
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered delete_table_food">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Seller</th>
<!--                  <th>Bids</th>-->
                  <th>End Time</th>
                  <th>Last Bid</th>
                  <th>Current Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  if( !empty($productInfos) )
                  {
                      $i=0;
                      foreach($productInfos as $result)
                      {
                          $i++;
                          ?>
                          <tr>                             
                              <td><?php echo $i;?></td>
                              <td>
                                  <?php $firstImage=explode('_split_',$result['image']); ?>
                                  <img class="rounded img-responsive avatar-view" id="res-img" name="image"
                                       src="<?= base_url('').'backend/'.$firstImage[0] ?>" alt="No image" width="60px" height="50px">
                              </td>
                              <td><?php echo $result["cat_name"];?></td>
                              <td><?php echo $result["name"];?></td>
                              <td><?php echo $result["description"];?></td>
                              <td><?php echo $result["seller"];?></td>
<!--                              <td>--><?php //echo $result["bids"];?><!--</td>-->
                              <td><?php echo $result["endtime"];?></td>
                              <td><?php echo $result["lastbid"];?></td>
                              <td><?php echo $result["price"];?></td>

                              <td>
                                  &nbsp;&nbsp;
                                  <a href="<?= base_url("product_con/detail") ?>?id=<?php echo $result["id"];?>"><i class="fa fa-eye" style="color: #1ABB9C" title="View detail"></i> </a> &nbsp;
                                  &nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash product_delete" style="color:#ff7474" id="<?php echo $result["id"];?>" title="Delete Auction"></i> </a>
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