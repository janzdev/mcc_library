<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Edit Student</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                    <li class="breadcrumb-item active">Edit Student</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">

                         </div>
                         <div class="card-body">
                              <?php
                              if(isset($_GET['id']))
                              {
                                   $user_id = mysqli_real_escape_string($con, $_GET['id']);

                                   $query = "SELECT * FROM user WHERE user_id ='$user_id'"; 
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                       $user = mysqli_fetch_array($query_run);
                                        ?>
                              <form action="user_student_code.php" method="POST">

                                   <div class="row d-flex justify-content-center mt-2">
                                        <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Lastname</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" id="" name="lastname"
                                                       value="<?=$user['lastname'];?>" class="form-control " required
                                                       autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Firstname</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="firstname" value="<?=$user['firstname'];?>"
                                                       class="form-control" autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 mt-2 input-group-sm">
                                                  <label for="">Middlename</label>
                                                  <input type="text" name="middlename" value="<?=$user['middlename'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Nickname</label>
                                                  <input type="text" name="nickname" value="<?=$user['nickname'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Gender</label>
                                                  <span class="text-danger">*</span>
                                                  <select name="gender" id="" value="<?=$user['gender'];?>"
                                                       class="form-control" autocomplete="off" required>
                                                       <option value="<?=$user['gender'];?>">
                                                            <?=$user['gender'];?>
                                                       </option>
                                                       <option value="Female">Female</option>
                                                       <option value="Male">Male</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Birthdate</label>
                                                  <input type="date" name="birthdate" value="<?=$user['birthdate'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Address</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="address" value="<?=$user['address'];?>"
                                                       autocomplete="off" class="form-control" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="cellphone_number"
                                                       value="<?=$user['cell_no'];?>" autocomplete="off"
                                                       class="form-control" required>
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Course</label>
                                                  <span class="text-danger">*</span>
                                                  <select name="course" id="" value="<?=$user['course'];?>"
                                                       class="form-control" required>
                                                       <option value="<?=$user['course'];?>"><?=$user['course'];?>
                                                       </option>
                                                       <option value="BSIT">BSIT</option>
                                                       <option value="BSED">BSED</option>
                                                       <option value="BEED">BEED</option>
                                                       <option value="BSBA">BSBA</option>
                                                       <option value="BSHM">BSHM</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Year Level</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="number" name="year_level"
                                                       value="<?=$user['year_level'];?>" class="form-control"
                                                       autocomplete="off" required min="1" max="4">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Student ID</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="student_id_no"
                                                       value="<?=$user['student_id_no'];?>" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                   </div>


                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Contact Person</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="contact_person"
                                                       value="<?=$user['contact_person'];?>" class="form-control"
                                                       required autocomplete="off">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class="mb-2 input-group-sm">
                                                  <label for="">Cell No.</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="number" name="contact_person_number"
                                                       value="<?=$user['contact_person_no'];?>" class="form-control"
                                                       autocomplete="off" required>
                                             </div>
                                        </div>

                                   </div>
                                   <div class="row d-flex justify-content-center">

                                        <div class="col-12 col-md-6">
                                             <div class=" input-group-sm">
                                                  <label for="">Email Address</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="email" value="<?=$user['email'];?>"
                                                       class="form-control" autocomplete="off" required>
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                             <div class=" input-group-sm">
                                                  <label for="">Username</label>
                                                  <input type="text" name="username" value="<?=$user['username'];?>"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>

                                   </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="user_student.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="update_student" class="btn btn-primary">Update
                                        Student</button>
                              </div>
                         </div>
                         </form>
                         <div class="card-footer"></div>
                         <?php
                              }
                              else
                              {
                                   echo "No such ID found";
                              }

                         }  
                         ?>
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