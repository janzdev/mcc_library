<?php 
include('includes/header.php');  
include('admin/config/dbcon.php');  
?>
<nav class="navbar navbar-inverse navbar-fixed-top shadow-sm">
     <div class="container-fluid">
          <div class="navbar-header d-flex ">
               <img src="assets/img/mcc-logo.png" class="mx-3" width="50px" height="50px" />
               <p class="navbar-text pull-right fw-semibold">MCC Learning Resource Center Attendance</p>
          </div>
     </div>
</nav>
<div class="container bg-primary text-white text-center mt-4 p-2 rounded">
     <br />
     <br />
     <br />
     <br />
     <div class="col-lg-3"></div>
     <div class="col-lg-12 well ">
          <h2>Attendance Login</h2>
          <br />
          <div id="result"></div>
          <br />
          <br />
          <div class="d-flex justify-content-center">
               <div class="col-md-6">
                    <form method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label class="fw-semibold fs-5">Student ID:</label>
                              <input type="text" id="student" name="student" class="form-control  "
                                   required="required" />
                              <br />
                              <div id="error"></div>
                              <br />
                              <button type="submit" name="login" id="login"
                                   class="btn text-white btn-info fw-semibold btn-block"><span
                                        class="glyphicon glyphicon-login"></span>Login</button>
                         </div>
                    </form>

                    <?php
                         if(isset($_POST['login']))
                         {
                              $student = $_POST['student'];
                              $time = date("H:i", strtotime("+8 HOURS"));
                              $date = date("Y-m-d", strtotime("+8 HOURS"));

                              $q_student = mysqli_query($con, "SELECT * FROM user WHERE student_id_no = '$student'") or die(mysqli_error());
                              if(mysqli_num_rows($q_student) > 0)
                              {
                                   $f_student = mysqli_fetch_array($q_student);

                                   $student_name = $f_student['firstname']." ".$f_student['lastname'];
                                   $query_run = mysqli_query($con, "INSERT INTO `time` VALUES ('', '$student', '$student_name', '$time', '$date')") or die(mysqli_error());
                                   
                                   echo "<h3 class = 'text-white  mt-3'>".$student_name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time))."</label></h3>";
                              }
                              else
                              {
                                   $_SESSION['message_error'] = 'No Student ID found';
                                   header("Location: statistic_attendance_login.php");
                                   exit(0);
                              }
                              
                         }
                    
                         


                   
                   
                    ?>

               </div>
          </div>
     </div>
</div>

<?php 
include('./includes/script.php');
include('./message.php');   
?>