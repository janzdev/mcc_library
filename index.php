<?php 
session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>




<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php include('message.php'); ?>
        <h1>Welcome User</h1>
        <button class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>





<?php include('includes/footer.php') ?>