<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>

<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>Borrowed Books</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Borrowed Books</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row ">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">

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
									ORDER BY borrow_book.borrow_book_id DESC") or die(mysqli_connect_error());
								$borrow_count = mysqli_num_rows($borrow_query);
								while($borrow_row = mysqli_fetch_array($borrow_query)){
									$id = $borrow_row ['borrow_book_id'];
									$book_id = $borrow_row ['book_id'];
									$user_id = $borrow_row ['user_id'];
							?>
                                             <tr>
                                                  <td><?php echo $borrow_row['book_barcode']; ?></td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['firstname']." ".$borrow_row['lastname']; ?>
                                                  </td>
                                                  <td style="text-transform: capitalize">
                                                       <?php echo $borrow_row['book_title']; ?>
                                                  </td>
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