<?php 
include('authentication.php');
include('includes/header.php'); 
include('includes/sidebar.php');  
 ?>
<?php 

$query = "SELECT * FROM  barcode ORDER BY mid_barcode DESC";
$query_run = mysqli_query($con, $query);

$fetch = mysqli_fetch_array($query_run);
$mid_barcode = $fetch['mid_barcode'];

$new_barcode = $mid_barcode + 1;
$pre_barcode = "MCC";
$suf_barcode = "LMS";
$generate_barcode = $pre_barcode.$new_barcode.$suf_barcode;

?>
<main id="main" class="main" style="height: 80vh;">
     <div class="pagetitle">
          <h1>ADD BOOK</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="books.php">Books</a></li>
                    <li class="breadcrumb-item">Add book</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row h-100%">

               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">

                         </div>
                         <form action="admincode.php" method="POST" enctype="multipart/form-data">
                              <div class=" card-body ">
                                   <div class=" row mt-2">
                                        <input type="hidden" name="new_barcode" value="<?= $new_barcode;?>">

                                        <div class="col-12 col-md-6">
                                             <div class=" mb-3">
                                                  <label for="title">Title</label>
                                                  <input type="text" name="book_title" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                             <div class=" mb-3">
                                                  <label for="author">Author/s</label>
                                                  <input type="text" name="author" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="publisher_name">Publisher</label>
                                                  <input type="text" name="publisher_name" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4  mb-3 input-group-sm">
                                             <div class="">
                                                  <label for="book_publication">Year</label>
                                                  <input type="text" name="book_publication" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="isbn">ISBN</label>
                                                  <input type="text" name="isbn" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="copyright_year">Copyright</label>
                                                  <input type="text" name="copyright_year" class="form-control"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12  col-md-4 mb-3">
                                             <div class="">
                                                  <label for="book_copies">No. of Copies</label>
                                                  <input type="number" name="book_copies" class="form-control" min="1"
                                                       autocomplete="off">
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4 mb-3">
                                             <div class="">
                                                  <label for="status">Status</label>
                                                  <select name="status" tabindex="-1" class="form-control">
                                                       <option value="">--Select Status--</option>
                                                       <option value="New">New</option>
                                                       <option value="Old">Old</option>
                                                       <option value="Lost">Lost</option>
                                                       <option value="Damaged">Damaged</option>
                                                       <option value="Replacement">Replacement</option>
                                                       <option value="Hardbound">Hardbound</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                             <div class="">
                                                  <label for="category_id">Category</label>
                                                  <select name="category_id" class="form-control">
                                                       <option value="">--Select Category--</option>
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
                                        <div class="col-12 col-md-4">
                                             <div class="">
                                                  <label for="book_image">Book Image</label>
                                                  <input type="file" name="book_image" class="form-control"
                                                       autocomplete="off">
                                                  <input type="hidden" name="book_image_old" id=""
                                                       value="<?=$book['book_image'];?>">
                                             </div>

                                        </div>
                                   </div>
                              </div>

                              <div class="card-footer d-flex justify-content-end">
                                   <div>
                                        <a href="books.php" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary" name="add_book">
                                             Add Book
                                        </button>
                                   </div>
                              </div>
                         </form>
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