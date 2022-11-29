<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main">
     <div class="pagetitle">
          <h1>Collection of Books</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Collection of Books</li>
               </ol>
          </nav>
     </div>
     <section class="section">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header d-flex justify-content-end">
                              <a href="book_add.php" class="btn btn-primary"><i class="bi bi-journal-plus"></i> Add
                                   Book</a>
                         </div>
                         <div class="card-body">
                              <div class="table-responsive mt-3">
                                   <table id="myDataTable" class="table table-bordered table-striped table-sm">
                                        <thead>
                                             <tr>
                                                  <th>Call Number</th>
                                                  <th>Accessial Number</th>
                                                  <th>Title</th>
                                                  <th>Author</th>
                                                  <th>Copyright Date</th>
                                                  <th>Publisher</th>
                                                  <th>Copy</th>
                                                  <th>Barcode</th>
                                                  <th>Action</th>

                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                             $query = "SELECT * FROM book";
                                             $query_run = mysqli_query($con, $query);
                                             
                                             if(mysqli_num_rows($query_run))
                                             {
                                                  foreach($query_run as $book)
                                                  {
                                                       ?>
                                             <tr>
                                                  <td><?=$book['call_number'];?></td>
                                                  <td><?=$book['accessial_number'];?></td>
                                                  <td><?=$book['title'];?></td>
                                                  <td><?=$book['author'];?></td>
                                                  <td><?=$book['copyright_date'];?></td>
                                                  <td><?=$book['publisher'];?></td>
                                                  <td><?=$book['copy'];?></td>
                                                  <td><?=$book['barcode'];?></td>
                                                  <td class=" justify-content-center">
                                                       <div class="btn-group" style="background: #DFF6FF;  ">
                                                            <!-- View Book Action-->
                                                            <a href="book_view.php?id=<?=$book['book_id']; ?>" name=""
                                                                 class="viewBookBtn btn btn-sm  border text-primary"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="View Book">
                                                                 <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <!-- Edit Book Action-->
                                                            <a href="book_edit.php?id=<?= $book['book_id']; ?>"
                                                                 name="update_book"
                                                                 class="btn btn-sm  border text-success"
                                                                 data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                 title="Edit Book">
                                                                 <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            <!-- Delete Book Action-->
                                                            <form action="books_code.php" method="POST">
                                                                 <button type="submit" name="delete_book"
                                                                      value="<?=$book['book_id'];?>"
                                                                      class="btn btn-sm  border text-danger"
                                                                      data-bs-toggle="tooltip"
                                                                      data-bs-placement="bottom" title="Delete Book">
                                                                      <i class="bi bi-trash-fill"></i>
                                                                 </button>
                                                            </form>
                                                       </div>
                                                  </td>
                                             </tr>

                                             <?php
                                                  }
                                             }
                                             else
                                             {
                                                  echo "No records found";
                                             }                                           
                                             ?>
                                        </tbody>
                                   </table>
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