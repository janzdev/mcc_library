<?php
session_start();

// Logout 
if(isset($_POST['logout_btn']))
{
  // session_destroy();
  unset($_SESSION['auth']);
  unset($_SESSION['auth_role']);
  unset($_SESSION['auth_stud']);
  

  $_SESSION['message_success'] ="Logout Successfully";
  header("Location: home.php");
  exit(0);
}


?>