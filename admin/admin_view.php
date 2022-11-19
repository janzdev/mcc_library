<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>View Admin</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                    <li class="breadcrumb-item active">View Admin</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">
                              <a href="admin.php" class="btn btn-primary">
                                   Back
                              </a>
                         </div>
                         <div class="card-body">
                              <?php
                              if(isset($_GET['id']))
                              {
                                   $admin_id = mysqli_real_escape_string($con, $_GET['id']);

                                   $query = "SELECT * FROM admin WHERE admin_id ='$admin_id'"; 
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                       $admin = mysqli_fetch_array($query_run);
                                        ?>


                              <div class="row">


                                   <div class="mb-3 mt-2">
                                        <span class="fw-bolder">Firstname &emsp;&emsp;&emsp;&nbsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['firstname'];?></p>
                                   </div>



                                   <div class="mb-3">
                                        <span class="fw-bolder">Middlename &emsp;&emsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['middlename'];?></p>
                                   </div>


                                   <div class="mb-3">
                                        <span class="fw-bolder">Lastname&emsp;&emsp;&emsp;&ensp;&nbsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['lastname'];?></p>
                                   </div>


                                   <div class="mb-3">
                                        <span class="fw-bolder">Email &ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['email'];?></p>
                                   </div>

                                   <div class="mb-3">
                                        <span class="fw-bolder">Address &emsp;&emsp;&emsp;&emsp;&ensp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['address'];?></p>
                                   </div>

                                   <div class="mb-3">
                                        <span class="fw-bolder">Phone Number &emsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['phone_number'];?></p>
                                   </div>
                                   <div class="mb-3">
                                        <span class="fw-bolder">Profile Image
                                             &emsp;&emsp;</span>
                                        <p class="d-inline">:&nbsp;<?=$admin['admin_image'];?></p>
                                   </div>

                              </div>

                         </div>
                         <div class="card-footer d-flex justify-content-end">


                              <?php
                              }
                              else
                              {
                                   echo "No such ID found";
                              }

                         }  
                         ?>
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