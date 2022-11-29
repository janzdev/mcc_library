<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

$student_id = $_GET['student_id'];

$user_query = mysqli_query($con,"SELECT * FROM user WHERE student_id_no = '$student_id' ");
$user_row = mysqli_fetch_array($user_query);
?>



<main id="main" class="main">
     <div class="pagetitle">
          <h1>Circulation</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="circulation.php">Circulation</a></li>
                    <li class="breadcrumb-item active"><a href="circulation_return.php">Return Book</a></li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row justify-content-center">
               <div class="col-lg-9">
                    <div class="card">
                         <div class="card-header d-flex justify-content-center
                         ">
                              <img src="assets/img/mcc_header.png" alt="">
                         </div>

                         <div class="card-body">
                              
                              <?php 
                              
                                  $return_query= mysqli_query($con,"select * from return_book 
                                  LEFT JOIN book ON return_book.book_id = book.book_id 
                                  LEFT JOIN user ON return_book.user_id = user.user_id 
                                  where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysqli_error());
                                       $return_count = mysqli_num_rows($return_query);
                                       
                                  $count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
                                  $count_penalty_row = mysqli_fetch_array($count_penalty);
                                  
                                  $return_row= mysqli_fetch_array ($return_query);
							$id=$return_row['return_book_id'];
                            
                             ?>
                              <h6 class="text-center fs-5 mt-5">This to Acknowledge that <span
                                        class="text-dark fw-bold">
                                        <?php echo $user_row['firstname'].' '.$user_row['middlename'].' '.$user_row['lastname']?></span>
                                   <h6 class="text-center fs-5 mb-4"> has paid the amount of Php<span
                                             class="text-dark fw-bold"> <?php echo $return_row['book_penalty'] ?></span>
                                        for the penalty.
                                   </h6>



                              </h6>
                              <h6 class="my-3 text-dark fw-bold ">Borrowed Books Details</h6>
                              <div class="table-responsive">
                                   <form></form>
                                   <table class="table table-bordered table-striped table-sm">
                                        <thead>
                                             <tr>
                                                  <th>Title</th>
                                                  <th>Author</th>
                                                  <th>Copyright Date</th>
                                                  <th>Publisher</th>
                                                  <th>Date Borrowed</th>
                                                  <th>Due Date</th>
                                                  <th>Date Returned</th>
                                                  <th>Penalty</th>


                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
							
?>
                                             <tr>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['title']; ?></td>
                                                  <td><?php echo $return_row['author']; ?></td>
                                                  <td><?php echo $return_row['copyright_date']; ?></td>
                                                  <td><?php echo $return_row['publisher']; ?></td>


                                                  <!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->
                                                  <td><?php echo date("M d, Y h:m:s a",strtotime($return_row['date_borrowed'])); ?>
                                                  </td>
                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' style='width:100px;'>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }
								
								?>
                                                  <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?>
                                             </tr>

                                             <?php 
							
													
							?>

                                        </tbody>
                                   </table>
                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                         <div class="btn-group m-2">
                              
                              <a href="acknowledgement_receipt_print.php?student_id=<?php echo $student_id ?>"
                                   target="_blank" class="btn btn-primary" name="accept">Accept</a>
                              <a href="circulation_returning.php?student_id=<?php echo $student_id ?>"
                                   class="btn btn-secondary">Cancel</a>
                                  
                         </div>
                    </div>
               </div>
     </section>
</main>
<?php
 if(isset($_POST['accept']))
 {
     mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
     mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
     values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());

     $report_history1=mysqli_query($con,"SELECT * FROM admin where admin_id = '$id_session' ") or die (mysqli_error());
     $report_history_row1=mysqli_fetch_array($report_history1);
     $admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];
          

     mysqli_query($con,"INSERT INTO report 
     (book_id, user_id, admin_name, detail_action, date_transaction)
     VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error());
 }
else
 {
     echo '<script> location.href="circulation_returning.php";</script';
 }


?>
<script>
window.location =
     "circulation_returning.php?student_id=<?php echo $student_id ?>";
</script>
<?php 
                        
?>
<?php
 
?>
<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('../message.php');   
?>