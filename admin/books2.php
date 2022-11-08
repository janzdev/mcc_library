<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>




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
                                   <i class="bi bi-journal-plus"></i>
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
                         <table id="myDataTable" class="table table-bordered table-hover table-light mytable">
                              <thead>
                                   <tr>
                                        <th>BookImage</th>
                                        <th>Barcode</th>
                                        <th>Title</th>
                                        <th>ISBN</th>
                                        <th>Author/s</th>
                                        <th>Copies</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Remarks</th>
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
                                                  $categoryt = $book['category_id'];

                                                  $query = "SELECT * FROM category WHERE category_id = '$categoryt'";
                                                  $query_run = mysqli_query($con, $query);
                                                  $category = mysqli_fetch_array($query_run);
                                   ?>
                                   <tr>

                                        <td>
                                             <?php if($book['book_image'] != ""): ?>
                                             <img src="../uploads/books<?= $book['book_image']?>" alt="" width="50px"
                                                  height="50px">
                                             <?php else:?>
                                             <img src="../uploads/books/book_image.jpg" class="img-thumbnail"
                                                  width="50px" height="50px">
                                             <?php endif?>
                                        </td>
                                        <td><?= $book['book_barcode']?></td>
                                        <td><?= $book['book_title'] ?></td>
                                        <td><?= $book['isbn'] ?></td>
                                        <td>
                                             <?= $book['author'].' '.$book['author_2'].'<br>'.$book['author_3'].' '.$book['author_4'].' '.$book['author_5'] ?>
                                        </td>
                                        <td><?= $book['book_copies'] ?></td>
                                        <td><?= $category['classname'] ?></td>
                                        <td><?= $book['status'] ?></td>
                                        <td><?= $book['remarks'] ?></td>





                                        <td class=" justify-content-center">
                                             <div class="btn-group" style="background: #DFF6FF;  ">
                                                  <!-- View Book Action-->
                                                  <button type="button"
                                                       class="viewBookBtn btn btn-sm  border text-primary"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="View Book">
                                                       <i class="bi bi-eye-fill"></i>
                                                  </button>
                                                  <!-- Edit Book Action-->
                                                  <button type="button"
                                                       class="editBookBtn btn btn-sm  border text-success"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Edit Book">
                                                       <i class="bi bi-pencil-fill"></i>
                                                  </button>
                                                  <!-- Delete Book Action-->
                                                  <button type="button"
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

<?php include('add_book.php');?>

<?php include('delete_book.php');?>

<?php include('edit_book.php');?>


<?php
include('includes/footer.php');
include('includes/script.php');
?>

<script>
$(document).ready(function() {
     $('.editBookBtn').on('click', function() {
          $('#editModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function() {
               return $(this).text();
          }).get();

          console.log(data);

          $('#edit_id').val(data[0]);

     });
});
$(document).ready(function() {
     $('.deleteBookBtn').on('click', function() {
          $('#deleteModal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function() {
               return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id').val(data[0]);
     });
});
</script>