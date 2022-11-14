<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>

<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>Student Attendance</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Attendance</li>
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
                                                  <th style="width:160px;">Member Image</th>
                                                  <th style="width:160px;">School ID Number</th>
                                                  <th style="width:160px;">Member Name</th>
                                                  <th style="width:160px;">Date Log In</th>
                                             </tr>
                                        </thead>
                                        <tbody>

                                             <?php
							$result= mysqli_query($con,"SELECT * FROM user_log 
							LEFT JOIN user ON user_log.user_id = user.user_id 
							ORDER BY user_log.user_log_id DESC ") or die (mysqli_connect_error());
							while ($row= mysqli_fetch_array ($result) ){
							$id=$row['user_log_id'];
							$user_id=$row['user_id'];
							?>
                                             <tr>
                                                  <td style="text-align:center;">
                                                       <?php if($row['user_image'] != ""): ?>
                                                       <img src="upload/<?php echo $row['user_image']; ?>" width="100px"
                                                            height="100px"
                                                            style="border:4px groove #CCCCCC; border-radius:5px;">
                                                       <?php else: ?>
                                                       <img src="images/user.png" width="100px" height="100px"
                                                            style="border:4px groove #CCCCCC; border-radius:5px;">
                                                       <?php endif; ?>
                                                  </td>
                                                  <td><?php echo $row['student_id_no']; ?></td>
                                                  <td><?php echo $row['user_name']; ?></td>
                                                  <td><?php echo date("M d, Y h:i:s a", strtotime($row['date_log'])); ?>
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