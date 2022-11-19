<?php
include('authentication.php');


if(isset($_POST['delete_admin']))
{
     $admin_id = mysqli_real_escape_string($con, $_POST['delete_admin']);

     $query = "DELETE FROM admin WHERE admin_id ='$admin_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Admin deleted successfully';
          header("Location: web_opac.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Admin not deleted';
          header("Location: web_opac.php");
          exit(0);
     }
}


// Update Admin
if(isset($_POST['edit_admin']))
{
     $admin_id =mysqli_real_escape_string($con, $_POST['admin_id']);

     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
     $admin_image = mysqli_real_escape_string($con, $_POST['admin_image']);

     $query = "UPDATE `admin` SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email', address='$address', phone_number='$phone_number', admin_image='$admin_image' WHERE admin_id = '$admin_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Admin Updated successfully';
          header("Location: admin.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Admin not Updated';
          header("Location: admin.php");
          exit(0);
     }
}


// Add Admin
if(isset($_POST['add_admin']))
{
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
     $admin_image = mysqli_real_escape_string($con, $_POST['admin_image']);

     $query = "INSERT INTO admin (firstname, middlename, lastname, email, address, phone_number, password, confirm_password, admin_image, admin_added) VALUES ('$firstname', '$middlename', '$lastname', '$email', '$address', '$phone_number', md5('$lastname'), md5('$lastname'), ' $admin_image', NOW()  )";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Admin Added successfully';
          header("Location: admin.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Admin not Added';
          header("Location: admin.php");
          exit(0);
     }
}
?>