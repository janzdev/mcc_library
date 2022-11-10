<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>
<?php 

// $query = "SELECT * FROM  barcode ORDER BY mid_barcode DESC";
// $query_run = mysqli_query($con, $query);

// $fetch = mysqli_fetch_array($query_run);
// $mid_barcode = $fetch['mid_barcode'];

// $new_barcode = $mid_barcode + 1;
// $pre_barcode = "MCC";
// $suf_barcode = "LMS";
// $generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;

?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>EDIT BOOK</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="books.php">Books</a></li>
                    <li class="breadcrumb-item">Edit book</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row ">

               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">

                         </div>

                         <div class="card-body ">
                              <?php
                                  

                                   if(isset($_GET['id']))
                                   {
                                        $book_id = mysqli_real_escape_string($con, $_GET['id']);
                                        
                                        $query = "SELECT * FROM book LEFT JOIN category ON book.category_id = category.category_id WHERE book_id='$book_id'";
                                        $query_run = mysqli_query($con, $query);
                                        
                                        

                                         
                                        // $query = "SELECT * FROM book WHERE book_id='$book_id'";
                                        // $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                             $book = mysqli_fetch_array($query_run);
                                             
                                             
                                             ?>
                              <form action="admincode.php" method="POST" enctype="multipart/form-data">
                                   <div class=" row mt-2">
                                        <input type="hidden" name="new_barcode" value="<?= $new_barcode;?>">

                                        <input type="hidden" name="book_id" value="<?=$book['book_id'];?>">

                                        <div class="col-12 col-md-6">
                                             <div class=" mb-3">
                                                  <label for="title">Title</label>
                                                  <input type="text" value="<?=$book['book_title'];?>" name="book_title"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                             <div class=" mb-3">
                                                  <label for="author">Author/s</label>
                                                  <input type="text" value="<?=$book['author'];?>" name="author"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="publisher_name">Publisher</label>
                                                  <input type="text" value="<?=$book['publisher_name'];?>"
                                                       name="publisher_name" class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4  mb-3 input-group-sm">
                                             <div class="">
                                                  <label for="book_publication">Year</label>
                                                  <input type="text" value="<?=$book['book_publication'];?>"
                                                       name="book_publication" class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="isbn">ISBN</label>
                                                  <input type="text" value="<?=$book['isbn'];?>" name="isbn"
                                                       class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="copyright_year">Copyright</label>
                                                  <input type="text" value="<?=$book['copyright_year'];?>"
                                                       name="copyright_year" class="form-control" autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12  col-md-4 mb-3">
                                             <div class="">
                                                  <label for="book_copies">No. of Copies</label>
                                                  <input type="number" value="<?=$book['book_copies'];?>"
                                                       name="book_copies" class="form-control" min="1"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="status">Status</label>
                                                  <select name=" status" tabindex="-1" class="form-control">
                                                       <option value="<?=$book['status'];?>"><?=$book['status'];?>
                                                       </option>
                                                       <option value="New">New</option>
                                                       <option value="Old">Old</option>
                                                       <option value="Lost">Lost</option>
                                                       <option value="Damaged">Damaged</option>
                                                       <option value="Replacement">Replacement</option>
                                                       <option value="Hardbound">Hardbound</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="category_id">Category</label>
                                                  <select name=" category_id" class="form-control">
                                                       <option value="<?=$book['category_id'];?>">
                                                            <?=$book['classname'];?></option>
                                                       <?php 
                                                       $query = "SELECT * FROM category";
                                                       $query_run = mysqli_query($con, $query);

                                                       foreach($query_run as $category) {
                                                  ?>
                                                       <option value="<?= $category['category_id']; ?>">
                                                            <?= $category['classname'];?>
                                                       </option>
                                                       <?php } ?>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">

                                                  <label for="book_image">Book Image</label>
                                                  <div
                                                       class="d-flex flex-column justify-content-end align-items-center">
                                                       <img class="p-2"
                                                            src="<?php echo "../uploads/books/".$book['book_image'];?>"
                                                            width="100px">
                                                       <input type="file" name="book_image" class="form-control"
                                                            autocomplete="off">

                                                       <input type="hidden" value="<?=$book['book_image'];?>"
                                                            name="book_image_old">
                                                  </div>
                                             </div>

                                        </div>

                                   </div>
                                   <div class="d-flex justify-content-end">
                                        <div>
                                             <a href="books.php" class="btn btn-secondary">Cancel</a>
                                             <button type="submit" class="btn btn-primary" name="update_book">
                                                  Update Book
                                             </button>
                                        </div>
                                   </div>
                              </form>
                              <?php
                                             
                                        }
                                        else
                                        {
                                             echo "<h4>No Record Found</h4>";
                                        }
                                   }
                                   ?>

                         </div>





                    </div>
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