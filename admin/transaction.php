<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>

<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>Transaction</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Transaction</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row h-100%">

               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">

                         </div>
                         <div class="card-body">
                              <form action="admincode.php" method="POST" class="p-5">
                                   <div class="row d-flex justify-content-center mt-5">
                                        <div class="form-group col-md-4">
                                             <select name="student_id_number" class="select2_single form-control mb-3">

                                                  <option value="0">Student ID Number:</option>
                                                  <?php
                                                       $query = "SELECT * FROM user WHERE role_as = 0";
                                                       $query_run = mysqli_query($con, $query);
                                                       while ( $user_row = mysqli_fetch_array($query_run) )
                                             {
                                                  $id = $user_row['user_id'];                 
                                                   ?>
                                                  <option value="<?= $user_row['student_id_no'];?>">
                                                       <?= $user_row['student_id_no'].'-'.$user_row['firstname'];?>

                                                  </option>
                                                  <?php
                                                  }
                                             ?>
                                             </select>
                                        </div>
                                   </div>
                                   <div class="row d-flex justify-content-center">
                                        <div class="col-md-4">
                                             <div class="d-grid gap-2">
                                                  <button type="submit" name="submit" class="btn btn-primary">
                                                       Submit
                                                  </button>
                                             </div>

                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>

          </div>
     </section>
</main>

<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('message.php');

?>