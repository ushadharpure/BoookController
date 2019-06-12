<?php
/**
This view is to show user add form
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
      
      <div class="card-header">Add User</div>
      <div class="card-body">
        <form name="rigister_form" method="post" action="<?php echo base_url('user/insert');?>">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Enter First Name">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Last Name</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Enter Last Name">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Date of Birth</label>
                <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" >
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Address</label>
                <textarea class="form-control" name="address" id="address" ></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Pin Code</label>
                <input class="form-control" type="number" name="pin_code" id="pin_code" placeholder="Enter Pin Code">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">Contact Number</label>
                <input class="form-control" type="text" name="contact_number" id="contact_number" placeholder="Enter Contact Number">
              </div>
            </div>
          </div>
          <center><input type="submit" class="btn btn-primary" value="Submit" /></center>
        </form>
      </div>
    </div>
   <?php include('includes/footer.php'); ?>