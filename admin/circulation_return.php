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
                    <li class="breadcrumb-item active">Return Book</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header text-bg-primary">
                              <i class="bi bi-book"></i> Return Book
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
                                                  header("Location: circulation_return.php");
                                                  exit(0);
                                             }
                                             ?>


                                             </select>



                                   </div>
                                   <div class="col-md-3 mt-3">
                                        <button type="submit" name="submit_return"
                                             class="btn btn-primary">Submit</button>
                                   </div>
                                   </form>


                                   <?php
                                   if (isset($_POST['submit_return'])) {

                                        $student_id = $_POST['student_id_no'];
                                   
                                        $sql = mysqli_query($con,"SELECT * FROM user WHERE student_id_no = '$student_id'");
                                        // $count = mysqli_num_rows($sql);
                                      
                                   
                                             if(mysqli_num_rows($sql) > 0)
                                             {
                                                  $row = mysqli_fetch_array($sql);
                                                 
                                                  $student_id = $_POST['student_id_no'];
                                                  echo ('<script> location.href="circulation_returning.php?student_id='.$student_id.'";</script');
                                                  
                                             }else{
                                                 
                                                   $_SESSION['message_error'] ='No Match Found';
                                                  header("Location: circulation_return.php");
                                                
                                             }
                                        }



                                       
                                   ?>



                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
                    </div>
                    <div class="card">
                         <div class="card-header text-dark fw-semibold">
                              Recent Returned Books
                         </div>
                         <div class="card-body">
                              <div class="table-responsive">
                                   <?php
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where return_book.return_book_id order by return_book.return_book_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
                                   <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered">

                                        <div class="pull-left">
                                             <div class="span">
                                                  <div class="alert alert-info mt-2 p-1"><i
                                                            class="icon-credit-card icon-large"></i>&nbsp;Total Amount
                                                       of
                                                       Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?>
                                                  </div>
                                             </div>
                                        </div>

                                        <thead>
                                             <tr>
                                                  <th>Barcode</th>
                                                  <th>Borrower Name</th>
                                                  <th>Title</th>
                                                  <!---	<th>Author</th>
									<th>ISBN</th>	-->
                                                  <th>Date Borrowed</th>
                                                  <th>Due Date</th>
                                                  <th>Date Returned</th>
                                                  <th>Penalty</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>
                                             <tr>
                                                  <td><?php echo $return_row['barcode']; ?></td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['title']; ?></td>
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
							}
							if ($return_count <= 0){
								echo '
									<table style="float:right;">
										<tr>
											<td style="padding:10px;" class="alert alert-danger">No Books returned at this moment</td>
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