<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<!-- Add  books Modal Start -->
<div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD BOOKS</h1>
                    <button type="button" class="btn bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close">
               </div>
               <form id="saveBook">
                    <div class="modal-body">
                         <div class="alert alert-warning d-none"></div>
                         <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="book_barcode">Barcode</label>
                                   <input type="texbarcode=" name="book_barcode" id="book_barcode" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="book_title">Title</label>
                                   <input type="text" name="book_title" id="book_title" class="form-control"
                                        autocomplete="off">
                              </div>

                         </div>


                         <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="author">Author 1</label>
                                   <input type="text" name="author" id="author" class="form-control" autocomplete="off">
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="author_2">Author 2</label>
                                   <input type="text" name="author_2" id="author_2" class="form-control"
                                        autocomplete="off">
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_3">Author 3</label>
                                   <input type="text" name="author_3" id="author_3" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_4">Author 4</label>
                                   <input type="text" name="author_4" id="author_4" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_5">Author 5</label>
                                   <input type="text" name="author_5" id="author_5" class="form-control"
                                        autocomplete="off">
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="book_publication">Publication</label>
                                   <input type="text" name="book_publication" id="book_publication" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="publisher_name">Publisher</label>
                                   <input type="text" name="publisher_name" id="publisher_name" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="isbn">ISBN</label>
                                   <input type="text" name="isbn" id="isbn" class="form-control" autocomplete="off">
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="copyright_year">Copyright</label>
                                   <input type="text" name="copyright_year" id="copyright_year" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="book_copies">Copies</label>
                                   <input type="number" name="book_copies" id="book_copies" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="status">Status</label>
                                   <select name="status" id="status" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="new">New</option>
                                        <option value="old">Old</option>
                                        <option value="lost">Lost</option>
                                        <option value="damaged">Damaged</option>
                                        <option value="replacement">Replacement</option>
                                        <option value="hardbound">Hardbound</option>

                                   </select>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6 col-sm-12">
                                   <label for="category_id">Category</label>
                                   <select name="category_id" id="category_id" class="form-control">
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
                              <!-- <div class="col-md-6 col-sm-12">
                                   <label for="book_image">Book Image</label>
                                   <input type="file" name="book_image" class="form-control" style="height: 44px;"
                                        autocomplete="off">
                              </div> -->
                         </div>


                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Add Books</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<!-- Add books Modal End -->

<!-- Edit  books Modal Start -->
<div class="modal fade" id="bookEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT BOOK</h1>
                    <button type="button" class="btn bi bi-x-lg" data-bs-dismiss="modal" aria-label="Close">
               </div>
               <form id="updateBook">
                    <div class="modal-body">

                         <div class="alert alert-warning d-none"></div>

                         <input type="text" name="book_id" id="book_id">
                         <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="book_barcode">Barcode</label>
                                   <input type="text" name="book_barcode" id="book_barcode" class="form-control">
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="book_title">Title</label>
                                   <input type="text" name="book_title" id="book_title" class="form-control"
                                        autocomplete="off">
                              </div>

                         </div>


                         <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="author">Author 1</label>
                                   <input type="text" name="author" id="author" class="form-control" autocomplete="off">
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                   <label for="author_2">Author 2</label>
                                   <input type="text" name="author_2" id="author_2" class="form-control"
                                        autocomplete="off">
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_3">Author 3</label>
                                   <input type="text" name="author_3" id="author_3" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_4">Author 4</label>
                                   <input type="text" name="author_4" id="author_4" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="author_5">Author 5</label>
                                   <input type="text" name="author_5" id="author_5" class="form-control"
                                        autocomplete="off">
                              </div>
                         </div>

                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="book_publication">Publication</label>
                                   <input type="text" name="book_publication" id="book_publication" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="publisher_name">Publisher</label>
                                   <input type="text" name="publisher_name" id="publisher_name" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="isbn">ISBN</label>
                                   <input type="text" name="isbn" id="isbn" class="form-control" autocomplete="off">
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="copyright_year">Copyright</label>
                                   <input type="text" name="copyright_year" id="copyright_year" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="book_copies">Copies</label>
                                   <input type="number" name="book_copies" id="book_copies" class="form-control"
                                        autocomplete="off">
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                   <label for="status">Status</label>
                                   <select name="status" id="status" class="form-control">
                                        <option value="">--Select Status--</option>
                                        <option value="new">New</option>
                                        <option value="old">Old</option>
                                        <option value="lost">Lost</option>
                                        <option value="damaged">Damaged</option>
                                        <option value="replacement">Replacement</option>
                                        <option value="hardbound">Hardbound</option>

                                   </select>
                              </div>
                         </div>
                         <!-- <div class="row">
                              <div class="col-md-6 col-sm-12">
                                   <label for="category_id">Category</label>
                                   <select name="category_id" id="category_id" class="form-control">
                                        <option value="">--Select Category--</option>
                                        
                                   </select>
                              </div>  -->
                         <!-- <div class="col-md-6 col-sm-12">
                                   <label for="book_image">Book Image</label>
                                   <input type="file" name="book_image" class="form-control" style="height: 44px;"
                                        autocomplete="off">
                              </div> -->
                    </div>



                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Update Books</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
<!-- Edit books Modal End -->



<!-- View Table Books Start -->
<main id="main" class="main">
     <div class="col-12">
          <div class="card book overflow-auto">
               <div class="card-header">
                    <div class="pagetitle">
                         <h1>Books List
                              <!-- Add book Button trigger modal -->
                              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                                   data-bs-target="#addBookModal">
                                   <i class="bi bi-plus-square"></i>
                                   Add Book
                              </button>
                         </h1>
                         <nav>
                              <ol class="breadcrumb m-0">
                                   <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                   <li class="breadcrumb-item active">Books</li>
                              </ol>
                         </nav>
                    </div>
               </div>
               <div class="card-body mt-2">
                    <div class="table-responsive">
                         <table id="myDatatable" class="table table-bordered table-hover mytable">
                              <thead>
                                   <tr>
                                        <!-- <th>BookImage</th> -->
                                        <th>Barcode</th>
                                        <th>Title</th>
                                        <th>ISBN</th>
                                        <th>Author/s</th>
                                        <th>Copies</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <!-- <th>Remarks</th> -->
                                        <th>Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php 
                              $query ="SELECT * FROM book";
                              $query_run = mysqli_query($con, $query);

                              if(mysqli_num_rows($query_run) > 0)
                              {
                                   foreach($query_run as $book)
                                   {
                              ?>
                                   <tr>


                                        <td><?= $book['book_barcode'] ?></td>
                                        <td><?= $book['book_title'] ?></td>
                                        <td><?= $book['isbn'] ?></td>
                                        <td>
                                             <?= $book['author'].$book['author_2'].$book['author_3'].$book['author_4'].$book['author_5'] ?>
                                        </td>
                                        <td><?= $book['book_copies'] ?></td>
                                        <td><?= $book['category_id'] ?></td>
                                        <td><?= $book['status'] ?></td>



                                        <td>
                                             <div class="btn-group" style="background: #DFF6FF;  ">
                                                  <!-- View Book Action-->
                                                  <button type="button" value="<?= $book['book_id'];?>"
                                                       class="viewBookBtn btn btn-sm  border text-primary"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="View Book">
                                                       <i class="bi bi-eye-fill"></i>
                                                  </button>
                                                  <!-- Edit Book Action-->
                                                  <button type="button" value="<?= $book['book_id'];?>"
                                                       class="editBookBtn btn btn-sm  border text-success"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Edit Book">
                                                       <i class="bi bi-pencil-fill"></i>
                                                  </button>
                                                  <!-- Delete Book Action-->
                                                  <button type="button" value="<?= $book['book_id'];?>"
                                                       class="deleteBookBtn btn btn-sm  border text-danger"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Delete Book">
                                                       <i class="bi bi-trash-fill"></i>
                                                  </button>
                                             </div>
                                        </td>
                                   </tr>
                                   <?php
                                   }
                              } 
                              ?>

                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</main>
<!-- View Table Books End -->



<?php
include('includes/footer.php');
include('includes/script.php');

?>
<script>
// Add Book
$(document).on('submit', '#saveBook', function(e) {
     e.preventDefault();

     var formData = new FormData(this);
     formData.append("save_book", true);
     $.ajax({
          type: "POST",
          url: "admincode.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {

               var res = jQuery.parseJSON(response);
               if (res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
               } else if (res.status == 200) {
                    $('#errorMessage').addClass('d-none');
                    $('#addBookModal').modal('hide');
                    $('#saveBook')[0].reset();

                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);

                    $('.mytable').load(location.href + " .mytable")
               }

          }
     });
});

// Edit Book
$(document).on('click', '.editBookBtn', function() {
     var book_id = $(this).val();
     // alert(book_id);
     $.ajax({
          type: "GET",
          url: "admincode.php?book_id=" + book_id,
          success: function(response) {

               var res = jQuery.parseJSON(response);
               if (res.status == 422) {

                    alert(res.message);

               } else if (res.status == 200) {

                    $('#book_id').val(res.data.book_id);
                    $('#book_title').val(res.data.book_title);
                    // $('#category_id').val(res.data.category_id);
                    $('#author').val(res.data.author);
                    $('#author_2').val(res.data.author_2);
                    $('#author_3').val(res.data.author_3);
                    $('#author_4').val(res.data.author_4);
                    $('#author_5').val(res.data.author_5);
                    $('#book_copies').val(res.data.book_copies);
                    $('#book_publication').val(res.data.book_publication);
                    $('#publisher_name').val(res.data.publisher_name);
                    $('#isbn').val(res.data.isbn);
                    $('#copyright_year').val(res.data.copyright_year);
                    $('#status').val(res.data.status);
                    $('#book_barcode').val(res.data.book_barcode);

                    $('#bookEditModal').modal('show');


               }
          }
     });
});

// Delete Book
$(document).on('click', '.deleteBookBtn', function(e) {
     e.preventDefault();

     if (confirm('Are you sure you want to delete this book?')) {
          var book_id = $(this).val();
          $.ajax({
               type: "POST",
               url: "admincode.php",
               data: {
                    'delete_book': true,
                    'book_id': book_id
               },
               success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {
                         alert(res.message);
                    } else if (res.status == 200) {

                         alertify.set('notifier', 'position', 'top-center');
                         alertify.success(res.message);

                         $('.mytable').load(location.href + " .mytable")
                    }

               }

          })

     }

});
</script>