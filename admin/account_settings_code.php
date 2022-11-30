<?php
include('authentication.php');

if(isset($_POST['change_password']))
{
     $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
     $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
     $renewpassword = mysqli_real_escape_string($con, $_POST['renewpassword']);

     $validate_query = "SELECT * FROM admin WHERE password = md5('$current_password')";
     $validate_query_run = mysqli_query($con, $validate_query);

     if(mysqli_num_rows($validate_query_run) > 0)
     {
          if($newpassword == $renewpassword)
          {
               $change_pass = "UPDATE `admin` SET password=md5('$newpassword'),  confirm_password=md5('$renewpassword')";
               $change_pass_run = mysqli_query($con, $change_pass);

               if($change_pass_run)
               {
                    $_SESSION['message_success'] = '<small>Password updated successfully</small>';
                    header("Location: account_settings.php");
                    exit(0);
               }
               else
               {
                    $_SESSION['message_error'] = 'Password not updated';
                    header("Location: account_settings.php");
                    exit(0);
               }
          }
          else
          {
               $_SESSION['message_error'] = '<small>Password and confirm password not match</small>';
               header("Location: account_settings.php");
               exit(0);
          }
     }
     else
     {
          $_SESSION['message_error'] = 'Current password not match';
          header("Location: account_settings.php");
          exit(0);
     }
}
?>