<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Manage Users</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Users</li>
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

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="user_student.php">
                                             <div
                                                  class="card bg-primary text-white p-5 d-flex flex-row justify-content-between">
                                                  <h2 class="">Students</h2>
                                                  <i class="bi bi-people-fill fs-1"></i>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="user_faculty.php">
                                             <div
                                                  class="card bg-primary text-white p-5 d-flex flex-row justify-content-between">
                                                  <h2>Faculty & Staff</h2>
                                                  <i class="bi bi-people fs-1"></i>
                                             </div>
                                        </a>
                                   </div>

                                   <!-- <div class="col-12 col-md-4 mt-3 ">
                                        <a href="#">
                                             <div
                                                  class="card bg-info fw-bolder h-100 text-white d-flex align-items-center justify-content-center">
                                                  <h2>BSIT</h2>
                                             </div>
                                        </a>
                                   </div>
                                   <div class="col-12 col-md-4 mt-3 ">
                                        <a href="#">
                                             <div
                                                  class="card bg-info fw-bolder h-100 text-white d-flex align-items-center justify-content-center ">
                                                  <h2>BSBA</h2>
                                             </div>
                                        </a>
                                   </div>
                                   <div class="col-12 col-md-4 mt-3 ">
                                        <a href="#">
                                             <div
                                                  class="card bg-info fw-bolder h-100 text-white d-flex align-items-center justify-content-center">
                                                  <h2>BSHM</h2>
                                             </div>
                                        </a>
                                   </div>
                                   <div class="col-12 col-md-6 mt-3 ">
                                        <a href="#">
                                             <div
                                                  class="card bg-info fw-bolder h-100 text-white d-flex align-items-center justify-content-center">
                                                  <h2>BSED</h2>
                                             </div>
                                        </a>
                                   </div>
                                   <div class="col-12 col-md-6 mt-3 ">
                                        <a href="#">
                                             <div
                                                  class="card bg-info fw-bolder h-100 text-white d-flex align-items-center justify-content-center">
                                                  <h2>BEED</h2>
                                             </div>
                                        </a>
                                   </div> -->
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