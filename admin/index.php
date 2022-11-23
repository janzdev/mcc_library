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
                              <div class="card info-card books-card border-3 border-top border-warning">

                                   <div class="card-body">
                                        <h5 class="card-title">Books</h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-book"></i>
                                             </div>
                                             <?php
                                             $query = "SELECT * FROM book";
                                             $query_run = mysqli_query($con, $query); 
                                             
                                             if($total_books = mysqli_num_rows($query_run))
                                             {
                                             ?>

                                             <div class="ps-3">
                                                  <h6><?=$total_books;?></h6>
                                                  <?php

                                             }
                                             ?>
                                                  <span class="text-danger small pt-2 fw-bold">Total books
                                                       available</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card students-card border-3 border-top border-primary">

                                   <div class="card-body">
                                        <h5 class="card-title">
                                             Students
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-people"></i>
                                             </div>
                                             <?php
                                             $query = "SELECT * FROM user";
                                             $query_run = mysqli_query($con, $query); 

                                             if($total_borrowers = mysqli_num_rows($query_run))
                                             {
                                                  ?>
                                             <div class="ps-3">
                                                  <h6><?=$total_borrowers;?></h6>
                                                  <?php

                                                  }
                                                  ?>
                                                  <span class="text-primary small pt-2 fw-bold">Total borrowers</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-xxl-4 col-md-4">
                              <div class="card info-card borrowed-card  border-3 border-top border-success">

                                   <div class="card-body">
                                        <h5 class="card-title ">
                                             Book Borrowed
                                        </h5>
                                        <div class="d-flex align-items-center">
                                             <div
                                                  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                  <i class="bi bi-box-arrow-up-right"></i>
                                             </div>
                                             <?php
                                             $query = "SELECT * FROM borrow_book WHERE borrowed_status = 'borrowed' ";
                                             $query_run = mysqli_query($con, $query); 

                                             if($total_borrowed = mysqli_num_rows($query_run))
                                             {
                                                  ?>
                                             <div class="ps-3">
                                                  <h6><?=$total_borrowed;?></h6>
                                                  <?php

                                                  }
                                                  ?>
                                                  <span class="text-success small pt-2 fw-bold">Total borrowed
                                                       books</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         <div class="col-12">
                              <div class="card recent-sales overflow-auto  border-3 border-top border-info">

                                   <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <h5 class="card-title">
                                                  Student Attendance
                                             </h5>
                                             <div>
                                                  <form action="" method="POST">
                                                       <a href="statistic_attendance.php" target="_blank" type="submit"
                                                            name="create_pdf" class="btn btn-danger mx-4"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Print Students Attendance">
                                                            <i class="bi bi-printer-fill"></i>
                                                       </a>
                                                  </form>
                                             </div>

                                        </div>
                                        <div class="table-responsive">
                                             <table id="myDataTable" class="table table-borderless table-striped ">
                                                  <thead>
                                                       <tr>
                                                            <th scope="col">Student ID</th>
                                                            <th scope="col">Student Name</th>
                                                            <th scope="col">Date & Time In</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php
                                                       $result= mysqli_query($con,"select * from user_log 
                                                       LEFT JOIN user ON user_log.user_id = user.user_id 
                                                       order by user_log.user_log_id DESC ") or die (mysqli_error());
                                                       while ($row= mysqli_fetch_array ($result) ){
                                                       $id=$row['user_log_id'];
                                                       $user_id=$row['user_id'];
                                                       ?>
                                                       <tr>
                                                            <td><?php echo $row['student_id_no']; ?></td>
                                                            <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?>
                                                            </td>
                                                            <td><?php echo date("M d, Y h:i:s a", strtotime($row['date_log'])); ?>
                                                            </td>
                                                       </tr>
                                                       <?php } ?>
                                                  </tbody>
                                             </table>
                                        </div>
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