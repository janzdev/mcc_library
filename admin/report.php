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
                                   <div class="table-responsive mt-3">
                                   <table id="myDataTable" cellpadding="0" cellspacing="0" border="0"
                                        class="table table-striped table-bordered">

                                        <thead>
                                             <tr>
                                                  <th>Penalty Amount</th>
                                                  <th>Received From</th>
                                                  <th>Person In Charge</th>
                                                  <th>Date Transaction</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                             <tr>
                                                  <td>10</td>
                                                  <td>Julito Ducay</td>
                                                  <td>admin admin admin</td>
                                                  <td>Date Transaction</td>
                                                 
                                             </tr>
                                             
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