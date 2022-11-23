<?php 
include('authentication.php');




if(isset($_POST['delete_student']))
{
     $user_id = mysqli_real_escape_string($con, $_POST['delete_student']);

     $query = "DELETE FROM user WHERE user_id ='$user_id'";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Student deleted successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not deleted';
          header("Location: user_student.php");
          exit(0);
     }
}

if(isset($_POST['update_student']))
{
    
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $course = mysqli_real_escape_string($con, $_POST['course']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
     $student_id_no = mysqli_real_escape_string($con, $_POST['student_id_no']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $username = mysqli_real_escape_string($con, $_POST['username']);

     $query = "INSERT INTO user (lastname, firstname, middlename, nickname, gender, course, address, cell_no, birthdate, email, year_level, student_id_no, contact_person, contact_person_no, username, user_added) VALUES ('$lastname', '$firstname', '$middlename', '$nickname', '$gender', '$course', '$address', '$cellphone_number', '$birthdate', '$email', '$year_level', '$student_id_no', '$contact_person', '$contact_person_no', '$username', NOW())";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Student Added successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not Added';
          header("Location: user_student.php");
          exit(0);
     }
    
} 

// Add Student
if(isset($_POST['add_student']))
{
    
     $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
     $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
     $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
     $nickname = mysqli_real_escape_string($con, $_POST['nickname']);
     $gender = mysqli_real_escape_string($con, $_POST['gender']);
     $course = mysqli_real_escape_string($con, $_POST['course']);
     $address = mysqli_real_escape_string($con, $_POST['address']);
     $cellphone_number = mysqli_real_escape_string($con, $_POST['cellphone_number']);
     $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
     $email = mysqli_real_escape_string($con, $_POST['email']);
     $year_level = mysqli_real_escape_string($con, $_POST['year_level']);
     $student_id_no = mysqli_real_escape_string($con, $_POST['student_id_no']);
     $contact_person = mysqli_real_escape_string($con, $_POST['contact_person']);
     $contact_person_no = mysqli_real_escape_string($con, $_POST['contact_person_number']);
     $username = mysqli_real_escape_string($con, $_POST['username']);

     $query = "INSERT INTO user (lastname, firstname, middlename, nickname, gender, course, address, cell_no, birthdate, email, year_level, student_id_no, contact_person, contact_person_no, username, user_added) VALUES ('$lastname', '$firstname', '$middlename', '$nickname', '$gender', '$course', '$address', '$cellphone_number', '$birthdate', '$email', '$year_level', '$student_id_no', '$contact_person', '$contact_person_no', '$username', NOW())";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
          $_SESSION['message_success'] = 'Student Added successfully';
          header("Location: user_student.php");
          exit(0);
     }
     else
     {
          $_SESSION['message_error'] = 'Student not Added';
          header("Location: user_student.php");
          exit(0);
     }
    
}     
?>