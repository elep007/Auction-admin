<style type="text/css">
  .form-control {    
    padding: 0px 10px;
    
  }
</style>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Financial</h3>
      </div>              
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Payment <small>Transaction</small></h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <h3>Transaction</h3>
            <table id="datatable" class="table table-striped table-bordered delete_table_billing">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Username</th>
                  <th>Transaction</th>
                  <th>Amount($)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
                  if( !empty($transactions))
                  {
                      foreach($transactions as $result)
                      {
                          ?>
                          <tr>
                              <td><?php echo $result["date"];?></td>
                              <td><?php echo $result["username"];?></td>
                              <td><?php echo $result["transaction"];?></td>
                              <td><?php echo $result["amount"];?></td>
                              <td>
                                  &nbsp;&nbsp;                                  
                                  <a href="javascript:void(0)"><i class="fa fa-trash payment_delete" style="color:#ff7474" id="<?php echo $result["id"];?>" title="Delete Transaction"></i> </a>
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
