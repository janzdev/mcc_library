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

                              <form action="web_opac_code.php" method="POST">

                                   <div class="mb-3 row mt-3">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">STUDENT ID</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Lastname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Firstname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>

                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Middlename</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nickname</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <div class="row">
                                             <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" class="form-control" id="inputPassword">
                                             </div>
                                             <label for="inputPassword" class="col-sm-2 col-form-label">/Cell
                                                  No:</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" class="form-control" id="inputPassword">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Birthdate</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Year Level</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <div class="row">
                                             <label for="inputPassword" class="col-sm-2 col-form-label">Contact
                                                  Person</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" class="form-control" id="inputPassword">
                                             </div>
                                             <label for="inputPassword" class="col-sm-2 col-form-label">/Cell
                                                  No:</label>
                                             <div class="col-sm-4 input-group-sm">
                                                  <input type="text" class="form-control" id="inputPassword">
                                             </div>
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Email Address</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                                   <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">User Name</label>
                                        <div class="col-sm-10 input-group-sm">
                                             <input type="text" class="form-control" id="inputPassword">
                                        </div>
                                   </div>
                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="user_student.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="add_book" class="btn btn-primary">Update Student</button>
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
include('../message.php');
?>