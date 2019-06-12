<?php
/**
This view is to show transaction list page
*/

include('includes/header.php');
include('includes/menu.php');      
?>
      
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('home'); ?>">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Transaction</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Transaction List <a href="<?php echo base_url('transaction'); ?>" title="Refresh"><i class="fa fa-refresh" style="margin-left: 10px"></i></a>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>Sr No</th>
                  <th>Book Name</th>
                  <th>Issued To</th>
                  <th>Issued Date</th>
                  <th>Returned Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
             <?php $i=1; foreach (json_decode($data) as $d) { ?>
                <tr>
                  <td align="left"><?php echo $i; ?></td>
                  <td align="left"><?php echo $d->book_name; ?></td>
                  <td align="left"><?php echo $d->user_name; ?></td>
                  <td align="center"><?php echo $d->date_of_issue; ?></td>
                  <td align="center"><?php echo $d->date_of_return; ?></td>
                  <td align="center"><?php echo $d->status; ?></td>
                </tr>
               </div>
              <?php $i++; } ?>  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated at <?= $_SESSION['last_refresh']; ?></div>
      </div>
    </div>
    
   <?php include('includes/footer.php'); ?>