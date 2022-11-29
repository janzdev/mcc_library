<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>View Book</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="web_opac_add.php">Web OPAC</a></li>
                    <li class="breadcrumb-item active">View Book</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">
                              <a href="web_opac.php" class="btn btn-primary">
                                   Back
                              </a>
                         </div>
                         <div class="card-body">
                              <?php
                              if(isset($_GET['id']))
                              {
                                   $book_id = mysqli_real_escape_string($con, $_GET['id']);

                                   $query = "SELECT * FROM web_opac WHERE web_opac_id ='$book_id'"; 
                                   $query_run = mysqli_query($con, $query);

                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                       $book = mysqli_fetch_array($query_run);
                                        ?>


                              <div class="row">
                                   <div class="d-flex justify-content-around p-3">
                                        <div class="text-center">
                                             <div class="mb-3 mt-2">
                                                  <span class="fw-bolder text-center">Image
                                                  </span>


                                             </div>
                                             <img src="../uploads/ebook_img/<?=$book['opac_image'];?>" alt=""
                                                  width="100px" height="100px" class="border border-info">
                                             <h6 class="mt-3"><?=$book['opac_image'];?></h6>
                                        </div>
                                        <div class="mt-4">
                                             <div class="mb-3">
                                                  <span class="fw-bolder">Title
                                                       &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
                                                  <p class="d-inline">:&nbsp;<?=$book['title'];?></p>
                                             </div>


                                             <div class="mb-3">
                                                  <span
                                                       class="fw-bolder">Author&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</span>
                                                  <p class="d-inline">:&nbsp;<?=$book['author'];?></p>
                                             </div>


                                             <div class="mb-3">
                                                  <span class="fw-bolder">Copyright Date
                                                       &emsp;</span>
                                                  <p class="d-inline">:&nbsp;<?=$book['copyright_date'];?></p>
                                             </div>

                                             <div class="mb-3">
                                                  <span class="fw-bolder">Publisher &emsp;&emsp;&emsp;&emsp;</span>
                                                  <p class="d-inline">:&nbsp;<?=$book['publisher'];?></p>
                                             </div>
                                        </div>

                                   </div>
                              </div>

                         </div>
                         <div class="card-footer d-flex justify-content-end">


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