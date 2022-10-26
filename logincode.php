<?php 
session_start();
include('./admin/config/dbcon.php');

if(isset($_POST['login_btn']))
{
  $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $login_query = "SELECT * FROM student WHERE student_id_no='$student_id' AND password= md5('$password') LIMIT 1";
  $login_query_run = mysqli_query($con, $login_query);

  if(mysqli_num_rows($login_query_run) > 0)
  {
    foreach($login_query_run as $data){
      $stud_id = $data['stud_id'];  
      $student_name = $data['firstname'].' '.$data['lastname'];  
      $student_email = $data['email'];
      $role_as = $data['role_as'];
    }
    $_SESSION['auth'] = true;
    $_SESSION['auth_role'] = "$role_as"; //1= Admin, 0 = User
    $_SESSION['auth_stud'] = [
      'stud_id'=>$stud_id,
      'stud_name'=>$student_name,
      'email'=>$student_email,
    ];
      
    if($_SESSION['auth_role'] == 1)  // 1 = Admin
    {
      $_SESSION['message'] = "Welcome to Dashboard";
      header("Location:admin/index.php");
      exit(0);
    }
    elseif($_SESSION['auth_role'] == 0) //0 = User
    {
      $_SESSION['message'] = "You are logged In";
      header("Location:index.php");
      exit(0);
    }
  }
  else
  {
   
    $_SESSION['message'] = "Invalid Email or Password";
    header("Location:login.php");
    exit(0);
  }
}
else
{
  $_SESSION['message'] = "You are not allowed to access this file";
  header("Location:login.php");
  exit(0);
}
?>