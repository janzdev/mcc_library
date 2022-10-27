<?php 
session_start();
include('includes/header.php'); 

if(empty($_SESSION['auth'])){
  $_SESSION['message'] = "Login first to access";
  header('Location: login.php');
}
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

<form action="allcode.php" method="POST">

     <button class="dropdown-item d-flex align-items-center" name="logout_btn" type="submit">
          <i class="bi bi-box-arrow-right"></i>
          <span>Log Out</span>
     </button>

</form>



<?php include('includes/footer.php') ?>