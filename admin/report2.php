<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main id="main" class="main">
     <div class="pagetitle">
          <h1>Report</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Report</li>
               </ol>
          </nav>
     </div>
     <section class="section profile">
          <div class="row">

               <div class="col-xl-12">
                    <div class="card">
                         <div class="card-body pt-3">
                              <ul class="nav nav-tabs nav-tabs-bordered">

                                   <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab"
                                             data-bs-target="#profile-edit">All Transaction</button></li>

                                   <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab"
                                             data-bs-target="#profile-change-password">Penalty Report</button></li>
                              </ul>
                              <div class="tab-content pt-2">

                                   <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">
                                        <div class="table-responsive mt-3">
                                             <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                                  class="table table-striped table-bordered">

                                                  <thead>
                                                       <tr>
                                                            <th>Student Name</th>
                                                            <th>Book Title</th>
                                                            <th>Task</th>
                                                            <th>Person In Charge</th>
                                                            <th>Date Transaction</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>

                                                       <?php
							$result= mysqli_query($con,"select * from report 
							LEFT JOIN book ON report.book_id = book.book_id 
							LEFT JOIN user ON report.user_id = user.user_id 
							order by report.report_id DESC ") or die (mysqli_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['report_id'];
							$book_id=$row['book_id'];
							$user_name=$row['firstname']." ".$row['middlename']." ".$row['lastname'];
                                   $admin =$row['admin_name'];
							
							?>
                                                       <tr>
                                                            <td><?php echo $user_name; ?></td>
                                                            <td><?php echo $row['title']; ?></td>
                                                            <td><?php echo $row['detail_action']; ?></td>
                                                            <td><?php echo $row['admin_name']; ?></td>
                                                            <td><?php echo date("M d, Y h:m:s a",strtotime($row['date_transaction'])); ?>
                                                            </td>
                                                       </tr>
                                                       <?php } ?>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>

                                   <div class="tab-pane fade pt-3" id="profile-change-password">
                                        <h5>Penalty Report</h5>
                                        <div class="table-responsive">
                                             <?php
							$return_query= mysqli_query($con,"select * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							where book_penalty > 0 AND return_book.return_book_id order by return_book.return_book_id DESC") or die (mysqli_error());
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>
                                             <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                                  class="table table-striped table-bordered">

                                                  <div class="pull-left">
                                                       <div class="span">
                                                            <div class="alert alert-info mt-2 p-1"><i
                                                                      class="icon-credit-card icon-large"></i>&nbsp;Total
                                                                 Amount
                                                                 of
                                                                 Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <thead>
                                                       <tr>

                                                            <th>Penalty Amount</th>
                                                            <th>Received from</th>
                                                            <th>Person In Charge</th>
                                                            <th>Due Date</th>
                                                            <th>Date Returned</th>

                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <?php
							while ($return_row= mysqli_fetch_array ($return_query) ){
							$id=$return_row['return_book_id'];
?>


                                                       <tr>
                                                            <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='alert alert-warning' style='width:100px;'>Php ".$return_row['book_penalty'].".00</td>";
								 }else {
									 echo "<td>".$return_row['book_penalty']."</td>";
								 }
								
								?>
                                                            <td style="text-transform: capitalize">
                                                                 <?php echo $return_row['firstname']." ".$return_row['middlename']." ".$return_row['lastname']; ?>
                                                            </td>
                                                            <td><?php echo $admin; ?></td>
                                                            <!---	<td style="text-transform: capitalize"><?php // echo $return_row['author']; ?></td>
								<td><?php // echo $return_row['isbn']; ?></td>	-->

                                                            <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' >".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['due_date']))."</td>";
								 }
								
								?>
                                                            <?php
								 if ($return_row['book_penalty'] != 'No Penalty'){
									 echo "<td class='' >".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
								 }else {
									 echo "<td>".date("M d, Y h:m:s a",strtotime($return_row['date_returned']))."</td>";
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
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</main>
<?php
include('includes/footer.php');
include('./includes/script.php');
?>