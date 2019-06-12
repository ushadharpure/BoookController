<?php
/**
This view is to show book update form
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
      
      <div class="card-header">Update Book</div>
      <div class="card-body">
        <form name="rigister_form" method="post" action="<?php echo base_url('book/update');?>">
          <input type="hidden" name="book_id" value="<?= $data->book_id; ?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Book Name</label>
                <input class="form-control" type="text" name="book_name" id="book_name" value="<?= $data->book_name; ?>" placeholder="Enter Book">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Author</label>
                <input class="form-control" type="text" name="author" id="author" value="<?= $data->author; ?>" placeholder="Enter Author">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Published Year</label>
                <select class="form-control" name="pub_year" id="pub_year" >
                  <option value=""></option>
                  <?php 
                  for($year=date('Y');$year>=1900;$year--) {
                  $select = '';
                    if($data->pub_year == $year) {
                      $select = ' selected';
                    }
                    echo "<option value='".$year."' ".$select.">".$year."</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Price</label>
                <input class="form-control" type="number" name="price" id="price" value="<?= $data->price; ?>" placeholder="Enter Price" required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Status</label>
                <select class="form-control" name="status" id="status" >
                <option value="Active" <?php if($data->status=="Active") echo " selected"; ?>>Active</option>
                <option value="Inactive" <?php if($data->status=="Inactive") echo " selected"; ?>>Inactive</option>
                </select>
              </div>
            </div>
          </div>
          <center><input type="submit" class="btn btn-primary" value="Submit" /></center>
        </form>
      </div>
    </div>
   <?php include('includes/footer.php'); ?>