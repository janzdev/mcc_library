<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>

<main id="main" class="main">
     <div class="pagetitle">
          <h1>Borrowers</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">borrowers</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row ">

               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">
                              <span class="mb-0">Members List</span>
                         </div>
                         <div class="card-body mt-3">
                              <div class="table-responsive">
                                   <table id="myDataTable" class="table table-bordered table-hover table-light mytable">
                                        <thead>
                                             <tr>
                                                  <th>Student ID No.</th>
                                                  <th>Members Fullname</th>
                                                  <th>Year Level</th>
                                                  <th>Course</th>
                                                  <th>Action</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                        $query ="SELECT * FROM user ORDER BY user_id DESC";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                             foreach($query_run as $user)
                                             {
                                                 
                                   ?>
                                             <tr>


                                                  <td><?=$user['student_id_no']?></td>
                                                  <td><?=$user['firstname'].' '.$user['middlename'].' '.$user['lastname']?>
                                                  </td>
                                                  <td><?=$user['year_level']?></td>
                                                  <td><?=$user['course']?></td>






                                                  <td class=" justify-content-center">
                                                       <div class="btn-group" style="background: #DFF6FF;  ">
                                                            <!-- View Book Action-->
                                                            <button type="button" name=""
                                                                 class="viewBookBtn btn btn-sm  border text-primary"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="View Book">
                                                                 <i class="bi bi-eye-fill"></i>
                                                            </button>
                                                            <!-- Edit Book Action-->
                                                            <a href="books_edit.php?id=<?= $user['user_id']; ?>"
                                                                 name="update_book"
                                                                 class="btn btn-sm  border text-success"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="Edit Book">
                                                                 <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            <!-- Delete Book Action-->
                                                            <form action="" method="POST">

                                                                 <button type="submit" name="delete_book"
                                                                      class="deleteBookBtn btn btn-sm  border text-danger"
                                                                      data-bs-toggle="tooltip"
                                                                      data-bs-placement="bottom" title="Delete Book">
                                                                      <i class="bi bi-trash-fill"></i>
                                                                 </button>
                                                            </form>
                                                       </div>
                                                  </td>
                                             </tr>
                                             <?php
                                   }
                              } 
                              ?>

                                        </tbody>
                                   </table>
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
include('message.php');

?>