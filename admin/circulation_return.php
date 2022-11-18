<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Circulation</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="circulation.php">Circulation</a></li>
                    <li class="breadcrumb-item active">Return Book</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between">

                         </div>
                         <div class="card-body">
                              <div class="row d-flex justify-content-center">
                                   <div class="col-md-3 mt-3">
                                        <form action="" method="POST">
                                             <select name="student_id_no" class="form-select " id="select_box">
                                                  <option class="w-100" value="">--Select Student ID--</option>
                                                  <?php
                                             $query ="SELECT * FROM user";
                                             $query_run = mysqli_query($con, $query);

                                             if(mysqli_num_rows($query_run) > 0)
                                             {
                                                  foreach($query_run as $student_id)
                                                  {
                                                       ?>
                                                  <option value="<?=$student_id['student_id_no'];?>">
                                                       <?=$student_id['student_id_no'].' - '.$student_id['firstname'];?>
                                                  </option>
                                                  <?php
                                                  }
                                             }
                                             else
                                             {
                                                  $_SESSION['message_error'] = 'No Record Found';
                                                  header("Location: circulation_return.php");
                                                  exit(0);
                                             }
                                             ?>


                                             </select>



                                   </div>
                                   <div class="col-md-3 mt-3">
                                        <button type="submit" name="submit_return"
                                             class="btn btn-primary">Submit</button>
                                   </div>
                                   </form>


                                   <?php
                                   if (isset($_POST['submit_return'])) {

                                        $student_id = $_POST['student_id_no'];
                                   
                                        $sql = mysqli_query($con,"SELECT * FROM user WHERE student_id_no = '$student_id'");
                                        // $count = mysqli_num_rows($sql);
                                      
                                   
                                             if(mysqli_num_rows($sql) > 0)
                                             {
                                                  $row = mysqli_fetch_array($sql);
                                                 
                                                  $student_id = $_POST['student_id_no'];
                                                  echo ('<script> location.href="circulation_returning.php?student_id='.$student_id.'";</script');
                                                  
                                             }else{
                                                 
                                                   $_SESSION['message_error'] ='No Match Found';
                                                  header("Location: circulation_return.php");
                                                
                                             }
                                        }



                                       
                                   ?>



                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                    </div>
               </div>
          </div>
     </section>
</main>

<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('../message.php');   
?>

<script>
var select_box_element = document.querySelector('#select_box');

dselect(select_box_element, {
     search: true
});
</script>