<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>

<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>Returned Books</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Returned Books</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row ">

               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">
                              <?php
							$return_query= mysqli_query($con,"SELECT * from return_book 
							LEFT JOIN book ON return_book.book_id = book.book_id 
							LEFT JOIN user ON return_book.user_id = user.user_id 
							WHERE return_book.return_book_id ORDER BY return_book.return_book_id DESC") or die (mysqli_connect_error());
								$return_count = mysqli_num_rows($return_query);
								
							$count_penalty = mysqli_query($con,"SELECT sum(book_penalty) FROM return_book ")or die(mysqli_connect_error());
							$count_penalty_row = mysqli_fetch_array($count_penalty);
							
							?>

                              <div class="d-flex flex-start pull-left pr-2">
                                   <div class="span">
                                        <div class="alert alert-info "><i
                                                  class="icon-credit-card icon-large"></i>&nbsp;Total Amount
                                             of
                                             Penalty:&nbsp;<?php echo "Php ".$count_penalty_row['sum(book_penalty)'].".00"; ?>
                                        </div>
                                   </div>
                              </div>

                         </div>
                         <div class="card-body">
                              <div class="table-responsive mt-2">

                                   <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered" id="example">



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
                                                  <td><?php echo $return_row['book_barcode']; ?></td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['firstname']." ".$return_row['lastname']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $return_row['book_title']; ?></td>
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