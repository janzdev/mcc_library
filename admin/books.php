<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>




<!-- View Table Books Start -->
<main id="main" class="main">
     <div class="col-12">
          <div class="card book overflow-auto">
               <div class="card-header pt-3 pb-0 px-3">
                    <div class="pagetitle">
                         <h1>Books List
                              <!-- Add book Button trigger modal -->
                              <a href="books_add.php" class="btn btn-primary float-end">
                                   <i class="bi bi-journal-plus"></i>
                                   Add Book
                              </a>
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

                                        <td class="d-flex justify-content-center">
                                             <div>
                                                  <?php if($book['book_image'] != ""): ?>
                                                  <img src="../uploads/books/<?= $book['book_image']?>" alt=""
                                                       width="50px" height="50px">
                                                  <?php else:?>
                                                  <img src="../uploads/books/book_image.jpg" class="img-thumbnail"
                                                       width="50px" height="50px">
                                                  <?php endif?>
                                             </div>
                                        </td>
                                        <td><?=$book['book_barcode']?></td>
                                        <td><?=$book['book_title']?></td>
                                        <td><?=$book['isbn']?></td>
                                        <td><?=$book['author']?></td>
                                        <td><?=$book['book_copies']?></td>
                                        <td><?=$category['classname']?></td>
                                        <td><?=$book['status']?></td>
                                        <td><?=$book['remarks']?></td>





                                        <td class=" justify-content-center">
                                             <div class="btn-group" style="background: #DFF6FF;  ">
                                                  <!-- View Book Action-->
                                                  <button type="button" name=""
                                                       class="viewBookBtn btn btn-sm  border text-primary"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="View Book">
                                                       <i class="bi bi-eye-fill"></i>
                                                  </button>
                                                  <!-- Edit Book Action-->
                                                  <a href="books_edit.php?id=<?= $book['book_id']; ?>"
                                                       name="update_book" class="btn btn-sm  border text-success"
                                                       data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                       title="Edit Book">
                                                       <i class="bi bi-pencil-fill"></i>
                                                  </a>
                                                  <!-- Delete Book Action-->
                                                  <form action="admincode.php" method="POST">
                                                       <input type="hidden" name="delete_id"
                                                            value="<?=$book['book_id'];?>">
                                                       <input type="hidden" name="delete_book_image"
                                                            value="<?=$book['book_image'];?>">
                                                       <button type="submit" name="delete_book"
                                                            class="deleteBookBtn btn btn-sm  border text-danger"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Delete Book">
                                                            <i class="bi bi-trash-fill"></i>
                                                       </button>
                                                  </form>
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
include('message.php')
?>