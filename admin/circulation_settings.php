<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Circulation Settings</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Circulation Settings</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card  border-3 border-top border-info">
                         <div class="card-header">

                         </div>
                         <div class="card-body">
                              <div class="clearfix"></div>
                              <div class="row">
                                   <?php include('circulation_settings_allowed_days.php');?>
                                   <?php include('circulation_settings_allowed_qntty.php');?>
                                   <?php include('circulation_settings_book_penalty.php');?>
                                   <div class="clearfix"></div>
                              </div>

                         </div>
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