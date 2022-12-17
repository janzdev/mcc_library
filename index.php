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
     <div class="row">
          <div class="col-12">
               <div class="card  mt-4 ">
                    <div class="card-header">
                         <div class="d-flex align-items-center justify-content-center mt-2 ">
                              <div class="mx-2">
                                   <img src="assets/img/mcc-logo.png" class="d-sm-none d-md-block me-2"
                                        style="height: 100px; width: 100px;" alt="MCC Logo">
                              </div>

                              <div class="col-8  mt-2  ">
                                   <h3 class="fw-semibold">Madridejos Community College Library</h3>
                                   <form class=" " method="GET">
                                        <div class="d-flex">
                                             <div class="input-group mb-3 me-5">
                                                  <input type="text" name="search"
                                                       value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>"
                                                       class="form-control" placeholder="Type here to search" required>
                                                  <button class="btn btn-primary px-md-5 px-sm-1">Search</button>
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
                                   New Acquisitions

                              </a>
                         </center>
                         <hr class="mt-2 mb-2 text-black">
                         <?php endif;?>
                         <div id="new_books" class="row row-cols-1 row-cols-md-12 g-4">
                              <?php if(isset($_GET['search']))
                         { ?>
                              <div class="card mt-4  border-0">


                                   <div class="card-body">
                                        <section class="section profile">
                                             <div class="row">

                                                  <div class="col-xl-3">
                                                       <div class="card">

                                                            <div
                                                                 class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                                                                 <div class="col-xl-9 fw-semibold text-primary">
                                                                      Library Catalog
                                                                 </div>
                                                                 <?php
                                                                 $query = "SELECT * FROM book";
                                                                 $query_run = mysqli_query($con, $query); 
                                                                 
                                                                 if($total_books = mysqli_num_rows($query_run))
                                                                 {
                                                                      
                                                                      echo '<div class="col mx-2 bg-info rounded text-center p-1 fw-semibold text-white">'.$total_books.'</div>';
                                                                 }
                                                                 else
                                                                 {
                                                                      echo '<div class="col mx-2">0</div>';
                                                                 }
                                                            ?>

                                                            </div>


                                                       </div>

                                                  </div>
                                                  <div class=" col-xl-9">

                                                       <?php
                         
                              $filtervalues = $_GET['search'];

                              $query = "SELECT * FROM book LEFT JOIN category on book.category_id = category.category_id WHERE CONCAT(title,author,publisher,accession_number) LIKE '%$filtervalues%'";
                                   //                     $query = "(SELECT book_id, book_image, title, author, copyright_date, copy, 'book' as type FROM book WHERE title LIKE '%" . 
                                   //  $filtervalues . "%' OR author LIKE '%" . $filtervalues ."%') 
                                   //  UNION
                                   //  (SELECT web_opac_id, opac_image, title, copyright_date, author, copy, 'web_opac' as type FROM web_opac WHERE title LIKE '%" . 
                                   //  $filtervalues."%' OR author LIKE '%" . $filtervalues ."%')";
                              $query_run = mysqli_query($con, $query);
                              
                              if(mysqli_num_rows($query_run) > 0)
                              {
                                   foreach($query_run as $book)
                                   {
                                        ?>
                                                       <div class="card mt-1">
                                                            <div class="card-body pt-3 d-md-flex d-sm-block">
                                                                 <div class="col-xl-2">
                                                                      <a href="book_details.php?id=<?=$book['book_id']?>"
                                                                           class="text-decoration-none">
                                                                           <?php if($book['book_image'] != ""): ?>
                                                                           <img src="uploads/books_img/<?php echo $book['book_image']?>"
                                                                                width="100px" alt="">
                                                                           <?php else: ?>
                                                                           <img src="uploads/books_img/book_image.jpg"
                                                                                alt="">
                                                                           <?php endif; ?>
                                                                      </a>
                                                                 </div>
                                                                 <div class="col-xl-10">

                                                                      <div class="row mt-3">

                                                                           <div class="col-lg-12 col-md-12  fs-6">
                                                                                <a href="book_details.php?id=<?=$book['book_id']?>"
                                                                                     style="text-decoration: none"
                                                                                     class="fw-bold">
                                                                                     <?=$book['title']?>
                                                                                </a>
                                                                                (<?=$book['copyright_date']?>)
                                                                           </div>
                                                                      </div>

                                                                      <div class="row mt-2">

                                                                           <div class="col-lg-9 col-md-8">
                                                                                by&nbsp;<?=$book['author'];?>
                                                                           </div>
                                                                      </div>
                                                                      <div class="row mt-5">

                                                                           <div
                                                                                class="col-lg-4 col-md-4 fw-semibold text-primary">
                                                                                <?=$book['copy'];?>&nbsp;Available
                                                                           </div>
                                                                           <div
                                                                                class="col-lg-6 col-md-6 fw-semibold text-dark">
                                                                                LRC
                                                                                Location:&nbsp;<?=$book['classname'];?></span>
                                                                           </div>
                                                                      </div>




                                                                 </div>
                                                            </div>
                                                       </div>
                                                       <?php
                              
                         }  
                         ?>
                                        </section>
                                   </div>
                              </div>

                              <!-- <div id="searchresult" class="text-center"></div> -->

                         </div>
                         <?php
                              
                               
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

                         <div class="col-12 col-md-3 ">
                              <a href="book_details.php?id=<?=$book['book_id']?>">
                                   <div class="card h-100 shadow">
                                        <?php if($book['book_image'] != ""): ?>
                                        <img src="uploads/books_img/<?php echo $book['book_image']; ?>" alt="">
                                        <?php else: ?>
                                        <img src="uploads/books_img/book_image.jpg" alt="">
                                        <?php endif; ?>

                                   </div>
                              </a>
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