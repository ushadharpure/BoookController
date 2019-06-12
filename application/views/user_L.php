<?php 
/**
This view is to show user list page
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
        <li class="breadcrumb-item active">User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> User List <a href="<?php echo base_url('user'); ?>" title="Refresh"><i class="fa fa-refresh" style="margin-left: 10px"></i></a>
          <a href="<?php echo base_url('user/add_form/user_A'); ?>" title="Add New User"><span style="float: right;"><i class="fa fa-plus-square"></i>&nbsp;New user</span></a>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>Name</th>
                  <th>D.O.B.</th>
                  <th>Address</th>
                  <th>Pin Code</th>
                  <th>Contact Number</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
             <?php foreach ($data as $d) { ?>
                <tr>
                  <td align="left"><?php echo $d->user_name; ?></td>
                  <td align="center"><?php echo $d->date_of_birth; ?></td>
                  <td align="left"><?php echo $d->address; ?></td>
                  <td align="center"><?php echo $d->pin_code; ?></td>
                  <td align="center"><?php echo $d->contact_number; ?></td>
                  <td align="center"><?php echo $d->status; ?></td>
                  <td align="center"><a href="<?php echo base_url('user/update_form/'.$d->user_id); ?>" title="Update"><i class="fa fa-edit"></i></a> &nbsp;             
                      <a href="#" data-toggle="modal" data-target="#deleteModal<?= $d->user_id; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal<?= $d->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 200px">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Select "Yes" below to delete entry, once deleted can't be reversed.</div>
                      <div class="modal-footer">
                        <a class="btn btn-primary" href="<?php echo base_url('user/delete').'/'.$d->user_id; ?>">Yes</a>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated at <?= $_SESSION['last_refresh']; ?></div>
      </div>
    </div>
    
   <?php include('includes/footer.php'); ?>