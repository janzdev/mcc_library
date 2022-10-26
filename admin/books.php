<?php
include('authentication.php');
include('includes/header.php')
?>
<main id="main" class="main">
     <div class="pagetitle">
          <h1>Books List</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Books</li>
               </ol>
          </nav>
     </div>
     <div class="col-12">
          <div class="card recent-sales overflow-auto">

               <div class="card-body">
                    <h5 class="card-title">
                         Recent Transactions
                         <div class="btn btn-primary float-end">Add Books</div>
                    </h5>
                    <table class="table table-borderless datatable">
                         <thead>
                              <tr>
                                   <th scope="col">#</th>
                                   <th scope="col">Students</th>
                                   <th scope="col">Books</th>
                                   <th scope="col">Price</th>
                                   <th scope="col">Status</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <th scope="row"><a href="#">#2457</a></th>
                                   <td>Brandon Jacob</td>
                                   <td>
                                        <a href="#" class="text-primary">At praesentium minu</a>
                                   </td>
                                   <td>$64</td>
                                   <td>
                                        <span class="badge bg-success">Approved</span>
                                   </td>
                              </tr>
                              <tr>
                                   <th scope="row"><a href="#">#2147</a></th>
                                   <td>Bridie Kessler</td>
                                   <td>
                                        <a href="#" class="text-primary">Blanditiis dolor omnis similique</a>
                                   </td>
                                   <td>$47</td>
                                   <td><span class="badge bg-warning">Pending</span></td>
                              </tr>
                              <tr>
                                   <th scope="row"><a href="#">#2049</a></th>
                                   <td>Ashleigh Langosh</td>
                                   <td>
                                        <a href="#" class="text-primary">At recusandae consectetur</a>
                                   </td>
                                   <td>$147</td>
                                   <td>
                                        <span class="badge bg-success">Approved</span>
                                   </td>
                              </tr>
                              <tr>
                                   <th scope="row"><a href="#">#2644</a></th>
                                   <td>Angus Grady</td>
                                   <td>
                                        <a href="#" class="text-primar">Ut voluptatem id earum et</a>
                                   </td>
                                   <td>$67</td>
                                   <td><span class="badge bg-danger">Rejected</span></td>
                              </tr>
                              <tr>
                                   <th scope="row"><a href="#">#2644</a></th>
                                   <td>Raheem Lehner</td>
                                   <td>
                                        <a href="#" class="text-primary">Sunt similique distinctio</a>
                                   </td>
                                   <td>$165</td>
                                   <td>
                                        <span class="badge bg-success">Approved</span>
                                   </td>
                              </tr>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>

</main>

<?php
include('includes/footer.php')
?>