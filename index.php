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



<div class="container ">
     <div class="row">
          <div class="col-12">
               <div class="card  mt-4 ">
                    <div class="card-header ">
                         <div class="d-flex  align-items-center justify-content-center mt-2 ">
                              <div class="mx-2">
                                   <img src="assets/img/mcc-logo.png" class="me-2" style="height: 100px; width: 100px;"
                                        alt="">
                              </div>

                              <div class="col-8  mt-2  ">
                                   <h3 class="fw-semibold">Madridejos Community College Library</h3>
                                   <form class=" " method="GET">
                                        <div class="d-flex">
                                             <div class="input-group mb-3 me-5">
                                                  <input type="text" name="search"
                                                       value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>"
                                                       class="form-control" placeholder="Search Book" required>
                                                  <button class="btn btn-primary px-5">Search</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>

                         </div>
                    </div>
                    <div class="card-body border border-0">
                         <?php if(!isset($_GET['search'])) :?>
                         <center>
                              <a href="#new_books" class="btn btn-primary mt-2 ">
                                   New Books Added
                              </a>
                         </center>
                         <hr class="mt-2 mb-2 text-black">
                         <?php endif;?>
                         <div id="new_books" class="row row-cols-1 row-cols-md-4 g-4 ">
                              <?php
                         if(isset($_GET['search']))
                         {
                              $filtervalues = $_GET['search'];

                              $query = "SELECT * FROM book WHERE CONCAT(title,author,publisher,accession_number) LIKE '%$filtervalues%'";
                              $query_run = mysqli_query($con, $query);
                              
                              if(mysqli_num_rows($query_run) > 0)
                              {
                                   foreach($query_run as $book)
                                   {
                                        ?>
                              <div class="col-12 col-md-3 ">
                                   <div class="card h-100">
                                        <?php if($book['book_image'] != ""): ?>
                                        <img src="uploads/books_img/<?php echo $book['book_image']; ?>" height="200px"
                                             alt="">
                                        <?php else: ?>
                                        <img src="uploads/books_img/book_image.jpg" height="200px" alt="">
                                        <?php endif; ?>
                                        <div class="card-body">
                                             <h5 class="card-title"><?=$book['title'];?></h5>
                                             <p class="card-text"><?=$book['author'];?></p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                             <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                             <a href="book_details.php?id=<?=$book['book_id']?>"
                                                  class="btn  btn-info text-white">View More
                                                  Details</a>
                                        </div>
                                   </div>
                              </div>
                              <?php
                                   }
                              }
                              else
                              {
                                 echo '<div class="col-md-12 alert alert-info h5 text-center">
                                 No Book Found
                               </div>';
                              }
                         }
                         else
                         {
                              ?>
                              <?php
                              $query = "SELECT * FROM book ORDER BY book_id DESC LIMIT 8";
                              $query_run = mysqli_query($con, $query);
                              
                              if(mysqli_num_rows($query_run) > 0)
                              {
                                   foreach($query_run as $book)
                                   {
                                        ?>

                              <div class="col-12 col-md-3">
                                   <div class="card h-100">
                                        <?php if($book['book_image'] != ""): ?>
                                        <img src="uploads/books_img/<?php echo $book['book_image']; ?>" height="200px"
                                             alt="">
                                        <?php else: ?>
                                        <img src="uploads/books_img/book_image.jpg" height="200px" alt="">
                                        <?php endif; ?>
                                        <div class="card-body">
                                             <h5 class="card-title"><?=$book['title'];?></h5>
                                             <p class="card-text"><?=$book['author'];?></p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-center">
                                             <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                                             <a href="book_details.php?id=<?=$book['book_id']?>"
                                                  class="btn  btn-info text-white">View More
                                                  Details</a>
                                        </div>
                                   </div>
                              </div>
                              <?php
                                   }
                         }
                    }
                         ?>




                         </div>

                    </div>

               </div>

               <div id="searchresult" class="text-center"></div>

          </div>
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