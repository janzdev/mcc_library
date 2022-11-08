<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>
<?php 
    $student_number = $_GET['student_id_number'];
    
    $user_query = "SELECT * FROM user WHERE student_id_no = $student_number";
    $user_run = mysqli_query($con, $user_query);
    $user_row = mysqli_fetch_array($user_run);
?>
<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>Transaction</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="transaction.php">Transaction</a></li>
                    <li class="breadcrumb-item">Borrow/Return</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row h-100%">

               <div class="col-lg-12">
                    <div class="card">
                         <?php
                         $query = "SELECT * FROM user WHERE student_id_no = '$student_number";
                         $run_query = mysqli_query($con, $query);
                         $name_row = mysqli_fetch_array($run_query); 
                         ?>
                         <div class="card-header">
                              Borrower Name:
                              <span><?= $name_row['firstname'].' '.$name_row['middlename'].' '.$name_row['lastname']?></span>
                         </div>
                         <div class="card-body ">
                              <div class="row">
                                   <form class="d-flex justify-content-center">
                                        <div class="col-md-4 my-2 input-group-sm">
                                             <input type="text" class="form-control" id="inputBarcode"
                                                  placeholder="Barcode">
                                        </div>
                                   </form>
                                   <div class="table-responsive">
                                        <table class="table  table-sm">
                                             <thead class="table-light">
                                                  <tr>
                                                       <th scope="col">#</th>
                                                       <th scope="col">First</th>
                                                       <th scope="col">Last</th>
                                                       <th scope="col">Handle</th>
                                                       <th scope="col">Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody class="table-group-divider">
                                                  <tr>
                                                       <th scope="row">1</th>
                                                       <td>Mark</td>
                                                       <td>Otto</td>
                                                       <td>@mdo</td>
                                                       <td>
                                                            <div class="btn btn-primary btn-sm">
                                                                 Borrow
                                                            </div>
                                                       </td>
                                                  </tr>

                                             </tbody>
                                             <tfoot class="table-group-divider">
                                                  <tr></tr>
                                             </tfoot>
                                        </table>
                                   </div>
                              </div>
                              <div class="row mt-4">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-sm">
                                             <thead>
                                                  <tr>
                                                       <th scope="col">#</th>
                                                       <th scope="col">First</th>
                                                       <th scope="col">Last</th>
                                                       <th scope="col">Handle</th>
                                                       <th scope="col">Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <th scope="row">1</th>
                                                       <td>Mark</td>
                                                       <td>Otto</td>
                                                       <td>@mdo</td>
                                                       <td>
                                                            <div class="btn btn-danger btn-sm">
                                                                 Return
                                                            </div>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <th scope="row">2</th>
                                                       <td>Jacob</td>
                                                       <td>Thornton</td>
                                                       <td>@fat</td>
                                                       <td>
                                                            <div class="btn btn-danger btn-sm">
                                                                 Return
                                                            </div>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <th scope="row">3</th>
                                                       <td colspan="2">Larry the Bird</td>
                                                       <td>@twitter</td>
                                                       <td>
                                                            <div class="btn btn-danger btn-sm">
                                                                 Return
                                                            </div>
                                                       </td>

                                                  </tr>

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
include('includes/footer.php');
include('includes/script.php');

?>