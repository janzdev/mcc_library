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
               $change_pass = "UPDATE `admin` SET password= md5('$newpassword'),  confirm_password=md5('$renewpassword')";
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


if (isset($_SESSION['auth_admin']['admin_id']))
{
     $id_session=$_SESSION['auth_admin']['admin_id'];

 }
                
          


if(isset($_POST['save_changes']))
{
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $phone = mysqli_real_escape_string($con, $_POST['phone']);
     $email = mysqli_real_escape_string($con, $_POST['email']);

     $query = "UPDATE `admin` SET firstname='$firstname', middlename='$middlename', lastname='$lastname', address='$address', phone_number='$phone', email='$email' WHERE admin_id ='$id_session' ";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Updated Successfully';
          header("Location: account_settings.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Not Updated';
          header("Location: account_settings.php");
          exit(0);
     }
}
?>