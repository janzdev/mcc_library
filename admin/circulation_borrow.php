<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <!-- <h1>Manage Users</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                    <li class="breadcrumb-item">Faculty & Staff</li>
               </ol>
          </nav> -->
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-between">

                         </div>
                         <div class="card-body">
                              <div class="col-12 col-md-6 mt-2">
                                   <div class="input-group mb-3 input-group-sm">
                                        <span class="input-group-text bg-primary text-white"
                                             id="basic-addon1">BARCODE</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="Username"
                                             aria-describedby="basic-addon1">
                                   </div>
                              </div>
                         </div>
                         <div class="card-footer">


                         </div>
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