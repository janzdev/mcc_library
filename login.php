<?php 
session_start();

if(isset($_SESSION['auth']))
{
  if(!isset($_SESSION['message']))
  {
    $_SESSION['message'] = "You are already logged in";
  }
    
    header("Location: index.php");
    exit(0);
  
 
}





include('./admin/config/dbcon.php');
include('includes/header.php');
?>


<section>

</section>
<section class="d-flex mt-5 flex-column  justify-content-center align-items-center">
     <div class="container-xl">
          <div class="col mx-auto rounded shadow bg-white">
               <div class="row">
                    <div class="col-md-6 ">
                         <div class="">
                              <img src="assets/img/mcc-logo.png" alt="logo" class="img-fluid d-none d-md-block  p-5" />
                         </div>
                    </div>
                    <div class="col-sm-12 col-md-6 px-5 ">
                         <div class="mt-5 mb-4">
                              <h4 class="m-0">
                                   Welcome to

                              </h4>
                              <h1><strong>MCC <span class="text-info">LIBRARY</span></strong></h1>
                         </div>

                         <form action="logincode.php" method="POST" class="needs-validation" novalidate>
                              <div class="col-md-12">
                                   <div class="form-floating mb-3">
                                        <input type="text" id="student_id" class="form-control" name="student_id"
                                             placeholder="Student ID No" autocomplete="off" required>
                                        <label for="student_id">Student ID No.</label>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                             Please enter your Student ID No.
                                        </div>
                                   </div>
                                   <div class="form-floating mb-3">
                                        <span class="password-show-toggle js-password-show-toggle"><span
                                                  class="uil"></span></span>
                                        <input type="password" id="password" class="form-control" name="password"
                                             placeholder="Password" required>
                                        <label for="password">Password</label>
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                             Please enter your password.
                                        </div>
                                   </div>
                              </div>
                              <div class="d-grid gap-2 md-3">
                                   <button type="submit" name="login_btn"
                                        class="btn btn-info text-light font-weight-bolder btn-lg">Login</button>
                                   <div class="text-center mb-3">
                                        <p>
                                             Don't have an account?
                                             <a href="./signup.php" class="text-info">Signup</a>
                                        </p>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     </div>
</section>

<?php include('includes/footer.php'); ?>

<script>
<?php 
if(isset($_SESSION['message']))
{
  ?>
alertify.set('notifier', 'position', 'top-center');
alertify.error('<?= $_SESSION['message']; ?>');



<?php
unset($_SESSION['message']);
}
?>
</script>