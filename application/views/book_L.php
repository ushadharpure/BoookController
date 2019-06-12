<?php
/**
This view is to show book list page
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
        <li class="breadcrumb-item active">Book</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Book List <a href="<?php echo base_url('book'); ?>" title="Refresh"><i class="fa fa-refresh" style="margin-left: 10px"></i></a>
          <a href="<?php echo base_url('book/add_form/book_A'); ?>" title="Add New Book"><span style="float: right;"><i class="fa fa-plus-square"></i>&nbsp;New Book</span></a>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr align="center">
                  <th>Book Name</th>
                  <th>Author</th>
                  <th>Published Year</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
             <?php 
             foreach (json_decode($data) as $d) { ?>
                <tr>
                  <td><?php echo $d->book_name; ?></td>
                  <td align="center"><?php echo $d->author; ?></td>
                  <td align="center"><?php echo $d->pub_year; ?></td>
                  <td align="center"><?php echo $d->price; ?></td>
                  <td align="center"><?php echo $d->stock; ?></td>
                  <td align="center"><?php echo $d->status; ?></td>
                  <td align="center">
                  <?php if($d->stock > 0) { ?>
                    <button type="button" class="btn btn-success" onclick="window.location.href = '<?php echo base_url('book/open_issue_return/issue_A/'.$d->book_id); ?>'">Issue</button> <?php } ?>
                  </td>
                  <td align="center">
                    <?php if($d->trans_flag != 0) { ?>
                    <button type="button" class="btn btn-primary" onclick="window.location.href = '<?php echo base_url('book/open_issue_return/return_A/'.$d->book_id); ?>'">Return</button> <?php } ?>
                  </td>
                  <td align="center"><a href="<?php echo base_url('book/update_form/'.$d->book_id); ?>" title="Update"><i class="fa fa-edit"></i></a> &nbsp;             
                  <?php if($d->trans_flag == 0) { ?>
<a href="#" data-toggle="modal" data-target="#deleteModal<?= $d->book_id; ?>" title="Delete"><i class="fa fa-trash-o"></i></a>
<?php }  ?>
                  </td>
                </tr>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal<?= $d->book_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 200px">
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
                        <a class="btn btn-primary" href="<?php echo base_url('book/delete').'/'.$d->book_id; ?>">Yes</a>
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