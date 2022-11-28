/* The above code is a PHP code that is used to return a book. */
<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

if (isset($_SESSION['auth_admin']['admin_id']))
{
     $id_session=$_SESSION['auth_admin']['admin_id'];

 }

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
                    <li class="breadcrumb-item active">Return Book</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between">
                              <div class="col-12 col-md-6 mt-2">

                              </div>
                         </div>
                         <div class="card-body">
                              <?php
                              $query = "SELECT * FROM user WHERE student_id_no = '$student_id'";
                              $query_run = mysqli_query($con, $query);

                              if($query_run)
                              {
                                   $row = mysqli_fetch_array($query_run);
                                   ?>
                              <div class="text-muted mt-3">Student Name&nbsp;: &nbsp;<span
                                        class="h5 text-primary p-0 m-0 text-uppercase fw-semibold"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'];?></span>
                              </div>
                              <div class="text-muted">
                                   Course&emsp;&emsp;&emsp;&ensp;&nbsp;:&ensp;<span
                                        class="text-dark"><?=$row['course'];?></span></div>
                              <div class="text-muted mb-2">Year Level&emsp;&emsp;&nbsp;:&ensp;<span
                                        class="text-dark"><?=$row['year_level'];?></span></div>
                              <?php

                              }
                              else
                              {
                                   echo "No rows returned";
                              }
                              ?>

                              <div class="table-responsive">
                                   <table class="table">

                                        <thead class="border-top  border-dark border-opacity-25">
                                             <tr>

                                                  <th>Title</th>
                                                  <th>Author</th>
                                                  <th>Copyright Date</th>
                                                  <th>Publisher</th>
                                                  <th>Barcode</th>
                                                  <th>Date Borrowed</th>
                                                  <th>Due Date</th>
                                                  <th>Penalty</th>
                                                  <th>Action</th>


                                                  <?php 
								$borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC") or die(mysqli_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$due_date= $borrow_row['due_date'];
								
								$timezone = "Asia/Manila";
								if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
								$cur_date = date("Y-m-d H:i:s");
								$date_returned = date("Y-m-d H:i:s");
								//$due_date = strtotime($cur_date);
								//$due_date = strtotime("+3 day", $due_date);
								//$due_date = date('F j, Y g:i a', $due_date);
								///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
								
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
							?>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                  <td>
                                                       <?php echo $borrow_row['title']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['author']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['copyright_date']; ?>
                                                  </td>
                                                  <td><?php echo $borrow_row['publisher']; ?></td>
                                                  <td><?php echo $borrow_row['barcode']; ?></td>

                                                  <td><?php echo date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed'])); ?>
                                                  </td>
                                                  <td><?php echo date('M d, Y h:m:s a',strtotime($borrow_row['due_date']))?>
                                                  </td>

                                                  <!---	<td><?php // echo date("M d, Y h:m:s a",strtotime($borrow_row['due_date'])); ?></td>	-->

                                                  <td><?php  echo $penalty; ?></td>
                                                  <td>
                                                       <form method="post" action="">
                                                            <input type="hidden" name="date_returned" class="new_text"
                                                                 id="sd" value="<?php echo $date_returned ?>" size="16"
                                                                 maxlength="10" />
                                                            <input type="hidden" name="user_id"
                                                                 value="<?php echo $borrow_row['user_id']; ?>">
                                                            <input type="hidden" name="borrow_book_id"
                                                                 value="<?php echo $borrow_row['borrow_book_id']; ?>">
                                                            <input type="hidden" name="book_id"
                                                                 value="<?php echo $borrow_row['book_id']; ?>">
                                                            <input type="hidden" name="date_borrowed"
                                                                 value="<?php echo $borrow_row['date_borrowed']; ?>">
                                                            <input type="hidden" name="due_date"
                                                                 value="<?php echo $borrow_row['due_date']; ?>">
                                                            <button type="submit" name="return" class="btn btn-danger">
                                                                 Return</button>
                                                       </form>
                                                  </td>
                                             </tr>
                                             <?php 
							}
							if ($borrow_count <= 0){
								echo '
									<table style="width:100%;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger text-center">No books borrowed</td>
										</tr>
									</table>
								';
							} 							
							?>
                                             <?php
								if (isset($_POST['return'])) {
									$user_id= $_POST['user_id'];
									$borrow_book_id= $_POST['borrow_book_id'];
									$book_id= $_POST['book_id'];
									$date_borrowed= $_POST['date_borrowed'];
									$due_date= $_POST['due_date'];
									$date_returned = $_POST['date_returned'];

									$update_copies = mysqli_query($con,"SELECT * from book where book_id = '$book_id' ") or die (mysqli_error());
									$copies_row= mysqli_fetch_assoc($update_copies);
									
									$book_copies = $copies_row['copy'];
									$new_book_copies = $book_copies + 1;
									
									
									
									mysqli_query($con,"UPDATE book SET copy = '$new_book_copies' where book_id = '$book_id'") or die (mysqli_error());
									
								
									$timezone = "Asia/Manila";
									if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
									$cur_date = date("Y-m-d H:i:s");
									$date_returned_now = date("Y-m-d H:i:s");
									//$due_date = strtotime($cur_date);
									//$due_date = strtotime("+3 day", $due_date);
									//$due_date = date('F j, Y g:i a', $due_date);
									///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));			
									
									$penalty_amount_query= mysqli_query($con,"select * from penalty order by penalty_id DESC ") or die (mysqli_error());
									$penalty_amount = mysqli_fetch_assoc($penalty_amount_query);
									
                                             
									if ($date_returned > $due_date) {
										$penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 *24) * ($penalty_amount['penalty_amount']));

                                                 
                                                
									} elseif ($date_returned < $due_date) {
										$penalty = 'No Penalty';
									} else {
										$penalty = 'No Penalty';
									}
                                             
                                            
								
									mysqli_query($con,"UPDATE borrow_book SET borrowed_status = 'returned', date_returned = '$date_returned_now', book_penalty = '$penalty' WHERE borrow_book_id= '$borrow_book_id' and user_id = '$user_id' and book_id = '$book_id' ") or die (mysqli_error());
									
									mysqli_query($con,"INSERT INTO return_book (user_id, book_id, date_borrowed, due_date, date_returned, book_penalty)
									values ('$user_id', '$book_id', '$date_borrowed', '$due_date', '$date_returned', '$penalty')") or die (mysqli_error());
									
                                             if($penalty === 'No Penalty')
                                                  {
                                                       
                                                  //    echo "<script>alert('Congrats');</script>";
                                                  //     echo '<script> location.href="circulation_returning.php?student_id='.$student_id.'";</script'; 
                                                  // $_SESSION['message_success'] = 'Book Return Successfully';
                                                       echo '<script> location.href="circulation_returning.php?student_id='.$student_id.'";</script'; 
                                                  // header("Location: circulation_returning.php");
     
                                                  }
                                                  else
                                                  {
                                                            // echo "<script>alert('You have Penalty of');</script>";
     
                                                       // echo "<script>alert('".'You have penalty of'." ".$penalty." '); window.location='circulation_returning.php?student_id=".$student_id."'</script>";

                                                       echo '<script> location.href="acknowledgement_receipt.php?student_id='.$student_id.'";</script'; 
                                                       
                                                       // echo '<script> location.href="acknowledgement_receipt.php?student_id='.$student_id.'";</script';
     
                                                       // echo '<script type="text/javascript">
                                                       // $(document).ready(function(){
                                                       //      $("#checkModal").modal("show");
                                                       // });
                                                       // </script>';
                                                  }
                                                  
                                                
                                             $report_history1=mysqli_query($con,"SELECT * FROM admin where admin_id = '$id_session' ") or die (mysqli_error());
									$report_history_row1=mysqli_fetch_array($report_history1);
									$admin_row1=$report_history_row1['firstname']." ".$report_history_row1['middlename']." ".$report_history_row1['lastname'];
										
									
									mysqli_query($con,"INSERT INTO report 
									(book_id, user_id, admin_name, detail_action, date_transaction)
									VALUES ('$book_id','$user_id','$admin_row1','Returned Book',NOW())") or die(mysqli_error());

                                            
									
							?>
                                             <script>
                                             window.location =
                                                  "circulation_returning.php?student_id=<?php echo $student_id ?>";
                                             </script>
                                             <?php 
																}
							?>
                                        </tbody>



                                   </table>
                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                    </div>
               </div>
          </div>
     </section>
</main>



<?php 
include('./includes/footer.php');
include('./includes/script.php');
include('./message.php');   
?>