<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Manage User</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">User</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">

                         </div>
                         <div class="card-body">
                              <div class="row">

                                   <div class="col-12 col-md-6 ">
                                        <a href="user_student.php">
                                             <div class="card bg-primary text-white p-3">
                                                  <h4>Students</h4>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="col-12 col-md-6 ">
                                        <a href="user_faculty.php">
                                             <div class="card bg-danger text-white p-3">
                                                  <h4>Faculty & Staff</h4>
                                             </div>
                                        </a>
                                   </div>
                              </div>
                         </div>
                         <div class="card-footer"></div>
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