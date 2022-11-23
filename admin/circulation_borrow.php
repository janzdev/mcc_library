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
                    <li class="breadcrumb-item active">Borrow Book</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header text-bg-primary">
                              <i class="bi bi-book"></i> Borrow Book
                         </div>
                         <div class="card-body">
                              <div class="row d-flex justify-content-center">
                                   <div class="col-md-3 mt-3">
                                        <form action="" method="POST">
                                             <select name="student_id_no" class="form-select " id="select_box">
                                                  <option class="w-100" value="">--Search Student ID--</option>
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
                                                  header("Location: circulation_borrow.php");
                                                  exit(0);
                                             }
                                             ?>


                                             </select>



                                   </div>
                                   <div class="col-md-3 mt-3">
                                        <button type="submit" name="submit_borrower"
                                             class="btn btn-primary">Submit</button>
                                   </div>
                                   </form>


                                   <?php
                                   if (isset($_POST['submit_borrower'])) {

                                        $student_id = $_POST['student_id_no'];
                                   
                                        $sql = mysqli_query($con,"SELECT * FROM user WHERE student_id_no = '$student_id'");
                                        // $count = mysqli_num_rows($sql);
                                      
                                   
                                             if(mysqli_num_rows($sql) > 0)
                                             {
                                                  $row = mysqli_fetch_array($sql);
                                                 
                                                  $student_id = $_POST['student_id_no'];
                                                  echo ('<script> location.href="circulation_borrowing.php?student_id='.$student_id.'";</script');
                                                  
                                             }else{
                                                 
                                                   $_SESSION['message_error'] ='No Match Found';
                                                  header("Location: circulaltion_borrow.php");
                                                
                                             }
                                        }



                                       
                                   ?>



                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                    </div>
                    <div class="card">
                         <div class="card-header text-dark fw-semibold ">
                              Recent Borrowed Books
                         </div>
                         <div class="card-body">
                              <div class="table-responsive mt-3">
                                   <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered" id="example">

                                        <thead>
                                             <tr>
                                                  <th>Barcode</th>
                                                  <th>Borrower Name</th>
                                                  <th>Title</th>
                                                  <th>Date Borrowed</th>
                                                  <th>Due Date</th>
                                                  <th>Date Returned</th>
                                                  <th>Status</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                             <?php
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id 
									LEFT JOIN user ON borrow_book.user_id = user.user_id 
									WHERE borrowed_status = 'borrowed'
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$id = $borrow_row ['borrow_book_id'];
									$book_id = $borrow_row ['book_id'];
									$user_id = $borrow_row ['user_id'];
							?>
                                             <tr>
                                                  <td><?php echo $borrow_row['barcode']; ?></td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['title']; ?></td>
                                                  <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?>
                                                  </td>
                                                  <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?>
                                                  </td>
                                                  <td><?php echo ($borrow_row['date_returned'] == "0000-00-00 00:00:00") ? "Pending" : date("M d, Y h:m:s a",strtotime($borrow_row['date_returned'])); ?>
                                                  </td>
                                                  <?php
									if ($borrow_row['borrowed_status'] != 'returned') {
										echo "<td class='alert alert-success'>".$borrow_row['borrowed_status']."</td>";
									} else {
										echo "<td  class='alert alert-danger'>".$borrow_row['borrowed_status']."</td>";
									}
								?>
                                             </tr>
                                             <?php } 
							if ($borrow_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books Borrowed at this Moment</td>
										</tr>
									</table>
								';
							} 							
							?>
                                        </tbody>
                                   </table>
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

<script>
var select_box_element = document.querySelector('#select_box');

dselect(select_box_element, {
     search: true
});
</script>