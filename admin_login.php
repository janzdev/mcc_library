<?php

 
session_start();
include('admin/config/dbcon.php');
include('includes/header.php');


if(isset($_POST['admin_login_btn']))
{
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $admin_login_query = "SELECT * FROM admin WHERE email='$email' AND password= md5('$password')";
  $admin_login_query_run = mysqli_query($con, $admin_login_query);

  if(mysqli_num_rows($admin_login_query_run) > 0)
  {
    foreach($admin_login_query_run as $data){
      $admin_id = $data['admin_id'];  
      $admin_name = $data['firstname'].' '.$data['lastname'];  
      $admin_email = $data['email'];
      $role_as = $data['role_as'];
    }
    $_SESSION['auth'] = true;
    $_SESSION['auth_role'] = "$role_as"; 
    $_SESSION['auth_admin'] = [
      'admin_id'=>$admin_id,
      'admin_name'=>$admin_name,
      'email'=>$admin_email,
    ];
      
    if($_SESSION['auth_role'] == 1)  // 1 = Admin
    {
      $_SESSION['message_success'] = "<small>Welcome to Dashboard Admin!</small>";
      header("Location:admin/index.php");
      exit(0);
    }
    
  }
  else
  {  
     
    $_SESSION['message_error'] = "Invalid email or password";
    header("Location: admin_login.php");
    exit(0);
  }
}
// else
// {
//   $_SESSION['message'] = "You are not allowed to access this file";
//   header("Location:admin_login.php");
//   exit(0);
// }
?>

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
                         <div class="mt-5 mb-1">
                              <h4 class="m-0">
                                   Welcome to

                              </h4>
                              <h1><strong>MCC <span class="text-info">LIBRARY</span></strong></h1>
                              <p class="m-0">Admin Login</p>
                         </div>

                         <form action="admin_login.php" method="POST" class="needs-validation" novalidate>
                              <div class="col-md-12">
                                   <div class="form-floating mb-3">
                                        <input type="email" id="email" class="form-control" name="email"
                                             placeholder="Student ID No" autocomplete="off" required>
                                        <label for="email">Email</label>
                                        <div id="validationServerEmailFeedback" class="invalid-feedback">
                                             Please enter your email
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
                              <div class="d-grid gap-2 md-3 mb-3">
                                   <button type="submit" name="admin_login_btn"
                                        class="btn btn-info text-light font-weight-bolder btn-lg">Login</button>

                              </div>
                              <a href="login.php" class="btn btn-primary mt-5 mb-3 float-end" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Login as User">
                                   <i class="bi bi-person-fill"></i>
                              </a>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     </div>
</section>
<?php
include('includes/footer.php');
include('message.php'); 
?>