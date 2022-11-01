<?php 
session_start();
include('includes/header.php'); 

if(empty($_SESSION['auth'])){
  $_SESSION['message'] = "<small>Login your Credentials to Access</small>";
  header('Location: login.php');
  exit(0);
}
if($_SESSION['auth_role'] != "0")
{
  header("Location: ./admin/index.php");
  exit(0);
}
?>




<div class="py-5">
     <div class="container">
          <div class="row bg-white rounded p-5">
               <div class="col-md-12">

                    <h1>Thank you <span class="text-info"><?= $_SESSION['auth_stud']['stud_name'];?></span> you are now
                         login </h1>
                    <form action="allcode.php" method="POST" class="d-flex justify-content-center">

                         <button class="btn btn-primary my-3" name="logout_btn" type="submit">
                              <i class="bi bi-box-arrow-right"></i>
                              <span>Log Out</span>
                         </button>

                    </form>
               </div>
          </div>
     </div>
</div>





<?php 
include('includes/footer.php');
include('message.php'); 
?>