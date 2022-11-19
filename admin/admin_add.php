<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 
?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Add Admin</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                    <li class="breadcrumb-item active">Add Admin</li>
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

                              <form action="admin_code.php" method="POST">

                                   <div class="row  mt-4">

                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Firstname</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="firstname" class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Middlename</label>
                                                  <input type="text" name="middlename" class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Lastname</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="lastname" class="form-control">
                                             </div>
                                        </div>

                                   </div>

                                   <div class="row">


                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Email</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="email" name="email" class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Address</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="text" name="address" class="form-control">
                                             </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Phone Number</label>
                                                  <span class="text-danger">*</span>
                                                  <input type="number" name="phone_number" class="form-control">
                                             </div>
                                        </div>



                                   </div>

                                   <div class="row">
                                        <div class="col-12 col-md-4">
                                             <div class="mb-3 mt-2">
                                                  <label for="">Profile Image</label>
                                                  <input type="file" name="admin_image" class="form-control">
                                             </div>
                                        </div>
                                   </div>


                         </div>
                         <div class="card-footer d-flex justify-content-end">
                              <div>
                                   <a href="admin.php" class="btn btn-secondary">Cancel</a>
                                   <button type="submit" name="add_admin" class="btn btn-primary">Add Admin</button>
                              </div>
                         </div>
                         </form>


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