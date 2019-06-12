<?php 
/**
This view is to show return book add form
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
        <li class="breadcrumb-item active">Return Book</li>
      </ol>
      
      <div class="card-header">Return Book</div>
      <div class="card-body">
        <form name="rigister_form" method="post" action="<?php echo base_url('book/return_book');?>" enctype="multipart/form-data">
          <input type="hidden" name="book_id" value="<?= $data->book_id; ?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Book Name</label>
                <input class="form-control" type="text" name="book_name" id="book_name" value="<?= $data->book_name; ?>" readonly>
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Return From</label>
                <select class="form-control" name="user_id" id="user_id" required="">
                  <option></option>
                  <?php 
                  foreach ($user_list as $value) {
                    echo "<option value='".$value->user_id."'>".$value->user_name."</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Return On</label>
                <input class="form-control" type="text" name="date_of_return" id="date_of_return" value="<?= date('d-m-Y'); ?>" readonly>
              </div>
            </div>
          </div>
          <center><input type="submit" class="btn btn-primary" value="Submit" /></center>
        </form>
      </div>
    </div>
   <?php include('includes/footer.php'); ?>