<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>
<?php 
    
    $student_id_number = $_GET['student_id_number'];

    
    
    
?>
<main id="main" class="main">
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
          <div class="row ">

               <div class="col-lg-12">
                    <div class="card">

                         <div class="card-header">
                              <?php
                            
                           
                            $query = "SELECT * FROM user WHERE student_id_no ='$student_id_number'";
                            $query_run = mysqli_query($con, $query);
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                 $name_row = mysqli_fetch_array($query_run);
                           
                            ?>

                              Borrower Name:
                              <span class="text-danger fw-semibold text-uppercase">
                                   <?php echo $name_row['firstname']." ".$name_row['middlename']." ".$name_row['lastname'];?>
                              </span>
                              <?php } ?>
                         </div>
                         <div class="card-body ">
                              <div class="row">
                                   <!-- <form class="d-flex justify-content-center">
                                        <div class="col-md-4 my-2 input-group-sm">
                                             <input type="text" class="form-control" id="inputBarcode"
                                                  placeholder="Barcode">
                                        </div>
                                   </form> -->
                                   <form method="post" class="d-flex justify-content-center">
                                        <div class="col-xs-4 my-2 input-group-sm">
                                             <input type="text" style="margin-bottom:10px; margin-left:-9px;"
                                                  class="form-control" name="barcode"
                                                  placeholder="Enter barcode here....." autofocus required />
                                        </div>
                                   </form>
                                   <div class="table-responsive">
                                        <table class="table  table-sm">

                                             <form method="post" action="admincode.php">

                                                  <th>Book Image</th>
                                                  <th>Barcode</th>
                                                  <th>Title</th>
                                                  <th>Author</th>
                                                  <th>ISBN</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                                  <?php
                                                        if (isset($_POST['barcode']))
                                                        {
                                                            
                                                            $barcode = $_POST['barcode'];
                                                            $book_query = mysqli_query($con,"SELECT * FROM book WHERE book_barcode = '$barcode' ");
                                                            $book_count = mysqli_num_rows($book_query);
                                                            while($book_row = mysqli_fetch_array($book_query))
                                                            {
                                                                 
                                                            if ($book_row['book_barcode'] != $barcode){
                                                                 $_SESSION['message_error'] = 'No match for the barcode entered!';
                                                                 // echo '
                                                                 //      <table>
                                                                 //           <tr>
                                                                 //                <td class="alert alert-info">No match for the barcode entered!</td>
                                                                 //           </tr>
                                                                 //      </table>
                                                                 // ';
                                                            } elseif ($barcode == '') {
                                                                 $_SESSION['message_error'] = 'Enter the correct details!';
                                                                 // echo '
                                                                 //      <table>
                                                                 //           <tr>
                                                                 //                <td class="alert alert-info">Enter the correct details!</td>
                                                                 //           </tr>
                                                                 //      </table>
                                                                 // ';
                                                            }else{
                                                       ?>




                                                  <tr>
                                                       <input type="hidden" name="user_id"
                                                            value="<?=$user_row['user_id'] ?>">
                                                       <input type="hidden" name="book_id"
                                                            value="<?=$book_row['book_id'] ?>">

                                                       <td>
                                                            <?php if($book_row['book_image'] != ""): ?>
                                                            <img src="../uploads/books/<?= $book_row['book_image']?>"
                                                                 width="70px" height="70px"
                                                                 style="border:4px groove #CCCCCC; border-radius:5px;">
                                                            <?php else: ?>
                                                            <img src="../uploads/books/<?= $book_row['book_image']?>"
                                                                 width="70px" height="70px"
                                                                 style="border:4px groove #CCCCCC; border-radius:5px;">
                                                            <?php endif; ?>
                                                       </td>
                                                       <td><?=$book_row['book_barcode'] ?></td>
                                                       <td style="text-transform: capitalize">
                                                            <?=$book_row['book_title'] ?>
                                                       </td>
                                                       <td style="text-transform: capitalize">
                                                            <?=$book_row['author'] ?></td>
                                                       <td><?=$book_row['isbn'] ?></td>
                                                       <td><?=$book_row['status'] ?></td>
                                                       <td><button name="borrow" class="btn btn-primary btn-sm"><i
                                                                      class="fa fa-check"></i>
                                                                 Borrow</button></td>
                                                  </tr>
                                                  <?php } } }?>
                                                  <?php
                                                  $allowable_days_query = "SELECT * FROM allowed_days ORDER BY allowed_days_id DESC";
                                                  $allowable_days_query_run = mysqli_query($con, $allowable_days_query);

                                                  // $allowable_days_query= mysqli_query($con,"select * from allowed_days order by allowed_days_id DESC ") or die (mysqli_error());
                                                  $allowable_days_row = mysqli_fetch_assoc($allowable_days_query_run);
                                                  
                                                  $timezone = "Asia/Manila";
                                                  if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
                                                  $cur_date = date("Y-m-d H:i:s");
                                                  $date_borrowed = date("Y-m-d H:i:s");
                                                  $due_date = strtotime($cur_date);
                                                  $due_date = strtotime("+".$allowable_days_row['no_of_days']." day", $due_date);
                                                  $due_date = date('Y-m-d H:i:s', $due_date);
                                                  ///$checkout = date('m/d/Y', strtotime("+1 day", strtotime($due_date)));
                                                  ?>
                                                  <input type="hidden" name="due_date" class="new_text" id="sd"
                                                       value="<?php echo $due_date ?>" size="16" maxlength="10" />
                                                  <input type="hidden" name="date_borrowed" class="new_text" id="sd"
                                                       value="<?php echo $date_borrowed ?>" size="16" maxlength="10" />



                                             </form>
                                        </table>
                                   </div>
                              </div>
                              <div class="row mt-4">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-sm mt-3">
                                             <thead>
                                                  <tr>
                                                       <th>Barcodde</th>
                                                       <th>Title</th>
                                                       <th>Author/s</th>
                                                       <th>ISBN</th>
                                                       <th>Date Borrowed</th>
                                                       <th>Due Date</th>
                                                       <th>Penalty</th>
                                                       <th>Action</th>
                                                       <?php
                                                      $query ="SELECT * FROM user WHERE student_id_no = '$student_id_number' ";
                                                      $query_run = mysqli_query($con, $query);
                                                  
                                                      if(mysqli_num_rows($query_run) > 0) 
                                                      {
                                                       
                                                       $user_row = mysqli_fetch_array($query_run);
                                                      
                                                     
                                                      
                                                      $borrow_query = mysqli_query($con,"SELECT * FROM borrow_book
									LEFT JOIN book ON borrow_book.book_id = book.book_id
									WHERE user_id = '".$user_row['user_id']."' && borrowed_status = 'borrowed' ORDER BY borrow_book_id DESC");
								              
                                                       $borrow_count = mysqli_num_rows($borrow_query);
                                                       while($borrow_row = mysqli_fetch_array($borrow_query))
                                                       {
                                                           
                                                            $due_date = $borrow_row['due_date'];
                                                            $timezone = "Asia/Manila";

                                                            
                                                            if(function_exists('date_default_timezone_set'))
                                                            date_default_timezone_set($timezone);
                                                            $cur_date = date("Y-m-d H:i:s");
                                                            $date_returned = date("Y-m-d H:i:s");


                                                            $penalty_amount_query = "SELECT * FROM penalty ORDER BY penalty_id DESC";
                                                            $penalty_amount_query_run = mysqli_query($con, $penalty_amount_query);

                                                            if($date_returned > $due_date)
                                                            {
                                                                 $penalty = round((float)(strtotime($date_returned) - strtotime($due_date)) / (60 * 60 * 24) * ($penalty_amount['penalty_amount']));
                                                            }
                                                            elseif ($date_returned < $due_date)
                                                            {
                                                                 $penalty = 'No Penalty';
                                                            }
                                                            else
                                                            {
                                                                 $penalty = 'No Penalty';
                                                            }
                                                       
                                                       ?>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td><?=$borrow_row['book_barcode'];?></td>
                                                       <td><?=$borrow_row['book_title'];?></td>
                                                       <td><?=$borrow_row['author'];?></td>
                                                       <td><?=$borrow_row['isbn'];?></td>
                                                       <td>
                                                            <?= date("M d, Y h:m:s a",strtotime($borrow_row['date_borrowed']));?>
                                                       </td>
                                                       <?php
                                                            if ($borrow_row['status'] != 'Hardbound') {
                                                                 echo "<td>".date('M d, Y h:m:s a',strtotime($borrow_row['due_date']))."</td>";
                                                            } else {
                                                                 echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                                            }
                                                       ?>
                                                       <?php
                                                            if ($borrow_row['status'] != 'Hardbound') {
                                                                 echo "<td>".$penalty."</td>";
                                                            } else {
                                                                 echo "<td>".'Hardbound Book, Inside Only'."</td>";
                                                            }
                                                       ?>
                                                       <td>
                                                            <form method="post" action="admincode.php">
                                                                 <input type="hidden" name="date_returned"
                                                                      class="new_text" id="sd"
                                                                      value="<?=$date_returned ?>" size="16"
                                                                      maxlength="10" />
                                                                 <input type="hidden" name="user_id"
                                                                      value="<?=$borrow_row['user_id']; ?>">
                                                                 <input type="hidden" name="borrow_book_id"
                                                                      value="<?=$borrow_row['borrow_book_id']; ?>">
                                                                 <input type="hidden" name="book_id"
                                                                      value="<?=$borrow_row['book_id']; ?>">
                                                                 <input type="hidden" name="date_borrowed"
                                                                      value="<?=$borrow_row['date_borrowed']; ?>">
                                                                 <input type="hidden" name="due_date"
                                                                      value="<?=$borrow_row['due_date']; ?>">
                                                                 <button name="return" class="btn btn-danger btn-sm"><i
                                                                           class="glyphicon glyphicon-remove"></i>
                                                                      Return</button>
                                                            </form>
                                                       </td>
                                                  </tr>

                                                  <?php
                                                  
                                                  }
                                                  if($borrow_count <= 0){
                                                       
                                                       echo '<table class="table table-sm" style="float:right;">
                                                                      <tr>
                                                                           <td style="padding:10px;" class="alert alert-danger text-center">No books borrowed</td>
                                                                      </tr>
                                                                 </table>
                                                            ';
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
          </div>
     </section>
</main>

<?php 
include('includes/footer.php');
include('includes/script.php');
include('message.php');

?>