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
                              <div class="table-responsive">
                                   <table cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered" id="example">

                                        <thead>
                                             <tr>
                                                  <th>Members Name</th>
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
							
							?>
                                             <tr>
                                                  <td><?php echo $user_name; ?></td>
                                                  <td><?php echo $row['book_title']; ?></td>
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