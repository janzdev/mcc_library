<?php 
include('includes/header.php');
include('includes/navbar.php');
include('admin/config/dbcon.php');

if(empty($_SESSION['auth'])){
//   $_SESSION['message_error'] = "<small>Login your Credentials to Access</small>";
  header('Location: home.php');
  exit(0);
}
if($_SESSION['auth_role'] != "0")
{
  header("Location:index.php");
  exit(0);
}
?>



<div class="container">
     <div class="col-12">
          <div class="d-flex  align-items-center justify-content-around mt-4">
               <div class="mx-2">
                    <img src="assets/img/mcc-logo.png" class="" style="height: 100px; width: 100px;" alt="">
               </div>

               <div class="col-10  mt-2 ">
                    <h3 class="fw-semibold">Madridejos Community College Library</h3>
                    <!-- <form class="d-flex " method="POST"> -->
                    <div class="d-flex">
                         <input class="form-control " type="text" id="live_search" placeholder="Search Book">
                         <button class="btn text-white btn-info mx-3 col-md-3 fw-semibold" type="submit"
                              name="search">Search</button>
                    </div>
                    <!-- </form> -->
               </div>

          </div>
          <div id="searchresult" class="text-center"></div>
          <div class="row row-cols-1 row-cols-md-3 g-2 mt-3">

               <?php
                                   $query = "SELECT * FROM web_opac";
                                   $query_run = mysqli_query($con, $query);
                                   
                                   if(mysqli_num_rows($query_run) > 0)
                                   {
                                        foreach($query_run as $ebook)
                                        {
                                             ?>

               <div class="col-md-3">
                    <div class="card h-100 text-center">
                         <img src="uploads/ebook_img/<?=$ebook['opac_image'];?>" height="150px" width="150px"
                              class="card-img-top" alt="...">
                         <div class="card-body">
                              <h5 class="card-title fw-semibold text-uppercase"><?=$ebook['title'];?></h5>
                              <p class="card-text"><?=$ebook['author'];?></p>

                         </div>
                         <div class="card-footer">
                              <form action="home_code.php" method="post">
                                   <a href="web_opac_view_pdf.php?id=<?=$ebook['web_opac_id']; ?>" name="viewpdf"
                                        class="btn text-white btn-info">Read
                                        Book</a>
                              </form>
                         </div>
                    </div>
               </div>



               <?php
                                        }
                                   }
                                   ?>


          </div>

     </div>
</div>
</div>

</div>

<?php
include('includes/footer.php');
include('includes/script.php');
include('message.php'); 
?>
<script>
$(document).ready(function() {
     $("#live_search").keyup(function() {
          var input = $(this).val();
          // alert(input);
          if (input != "") {
               $.ajax({
                    url: "home_code.php",
                    method: "POST",
                    data: {
                         input: input
                    },

                    success: function(data) {
                         $("#searchresult").html(data);
                    }
               });
          } else {
               $("#searchresult").css("display", "none");
          }
     });
});
</script>