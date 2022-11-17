<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>




<main id="main" class="main">
     <div class="pagetitle">

          <h1>Statistic</h1>

          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Statistic</li>
               </ol>
          </nav>
     </div>

     <section class="section dashboard">
          <div class="row">
               <div class="col-lg-12">
                    <div class="row">
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card books-card">

                                   <div class="card-body">
                                        <h5 class="card-title">Books</h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-book"></i>
                                             </div>

                                             <div class="ps-3">
                                                  <h6>6</h6>
                                                  <span class="text-danger small pt-2 fw-bold">Total books
                                                       available</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card students-card">

                                   <div class="card-body">
                                        <h5 class="card-title">
                                             Students
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-people"></i>
                                             </div>
                                             <div class="ps-3">
                                                  <h6>10</h6>
                                                  <span class="text-primary small pt-2 fw-bold">Total borrowers</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card borrowed-card">

                                   <div class="card-body">
                                        <h5 class="card-title">
                                             Book Borrowed
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-box-arrow-up-right"></i>
                                             </div>
                                             <div class="ps-3">
                                                  <h6>20</h6>
                                                  <span class="text-success small pt-2 fw-bold">Total borrowed
                                                       books</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-12">
                              <div class="card recent-sales overflow-auto">

                                   <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <h5 class="card-title">
                                                  Student Attendance
                                             </h5>
                                             <div>
                                                  <a href="#" class="btn btn-danger btn-sm">EXPORT</a>
                                             </div>

                                        </div>

                                        <table id="myDataTable" class="table table-borderless datatable">
                                             <thead>
                                                  <tr>
                                                       <th scope="col">Student ID No.</th>
                                                       <th scope="col">Students</th>
                                                       <th scope="col">Time In</th>
                                                       <th scope="col">Time Out</th>
                                                       <th scope="col">Date</th>
                                                  </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                        </table>
                                   </div>
                              </div>
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