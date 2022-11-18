<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 
?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Add Student</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                    <li class="breadcrumb-item active">Add Student</li>
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

                              <form action="user_student_code.php" method="POST">

                                   <div class="mb-2 row mt-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">STUDENT ID</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="student_id_no" class="form-control"
                                                  id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Lastname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="lastname" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Firstname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="firstname" class="form-control"
                                                  id="inputPassword">
                                        </div>
                                   </div>

                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Middlename</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="middlename" class="form-control"
                                                  id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nickname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="nickname" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="gender" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="course" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <div class="row">
                                             <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" name="address" class="form-control"
                                                       id="inputPassword">
                                             </div>
                                             <label for="inputPassword" class="col-sm-2 col-form-label">/Cell
                                                  No:</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" name="cellphone_number" class="form-control"
                                                       id="inputPassword">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Birthdate</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="birthdate" class="form-control"
                                                  id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Year Level</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="year_level" class="form-control"
                                                  id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <div class="row">
                                             <label for="inputPassword" class="col-sm-2 col-form-label">Contact
                                                  Person</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" name="contact_person" class="form-control"
                                                       id="inputPassword">
                                             </div>
                                             <label for="inputPassword" class="col-sm-2 col-form-label">/Cell
                                                  No:</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" name="contact_person_number" class="form-control"
                                                       id="inputPassword">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Email Address</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="email" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-2 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" name="username" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="user_student.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
                              </div>
                         </div>
                         </form>
                         <div class="card-footer"></div>

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