<?php 
session_start();
include('./includes/header.php');
include('./admin/config/dbcon.php');
?>
<div class="row justify-content-center">
  <div class="col-md-7">

    <?php include('message.php'); ?>

    <div class="card">
      <div class=" card-header">
        <h4>Register</h4>
      </div>
      <div class="card-body">
        <form action="./registercode.php" method="POST">

          <div class="row">
            <div class="form-group col-md-4 mb-3">
              <label>Lastname</label>
              <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Firstname</label>
              <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Middlename</label>
              <input type="text" name="middlename" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4 mb-3">
              <label>Nickname</label>
              <input type="text" name="nickname" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Gender</label>
              <input type="text" name="gender" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Course</label>
              <input type="text" name="course" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-8 mb-3">
              <label>Address</label>
              <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Cell No.</label>
              <input type="number" name="cell_no" class="form-control" required>
            </div>
          </div>


          <div class="row">
            <div class="form-group col-md-4 mb-3">
              <label>Birthdate</label>
              <input type="text" name="birthdate" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Email Add</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Year Level</label>
              <input type="text" name="year_level" class="form-control" required>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4 mb-3">
              <label>Student ID No.</label>
              <input type="text" name="student_id_no" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Contact Person</label>
              <input type="text" name="contact_person" class="form-control" required>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label>Cell No.</label>
              <input type="number" name="contact_person_no" class="form-control" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group col-md-6 mb-3">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group col-md-6 mb-3">
              <label>Confirm Password</label>
              <input type="password" name="cpassword" class="form-control" required>
            </div>
          </div>
          <div class="form-group  mb-3">
            <button type="submit" name="register_btn" class="btn btn-primary float-end">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include('./includes/footer.php'); ?>