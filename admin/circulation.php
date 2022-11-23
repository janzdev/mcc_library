<?php 
include('authentication.php');
include('includes/header.php'); 
include('./includes/sidebar.php'); 

?>


<main id="main" class="main ">
     <div class="pagetitle">
          <h1>Circulation</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Circulation</li>
               </ol>
          </nav>
     </div>
     <section class="section ">
          <div class="row">
               <div class="col-lg-12">
                    <div class="card " style="height:58vh;">
                         <div class="card-header d-flex justify-content-end">

                         </div>
                         <div class="card-body">
                              <div class="row">

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="circulation_borrow.php">
                                             <div
                                                  class="card bg-primary text-white p-3 d-flex flex-row justify-content-between">
                                                  <h4>Borrow Book</h4>
                                                  <i class="bi bi-book fs-2"></i>
                                             </div>
                                        </a>
                                   </div>

                                   <div class="col-12 col-md-6 mt-3">
                                        <a href="circulation_return.php">
                                             <div
                                                  class="card bg-primary text-white p-3 d-flex flex-row justify-content-between">
                                                  <h4>Return Book</h4>
                                                  <i class="bi bi-book fs-2"></i>
                                             </div>
                                        </a>
                                   </div>
                              </div>
                              <!-- <div class="row">
                                   <div class="col-12 col-md-6">
                                        <div class="card border-3 border-top border-info">
                                             <div class="card-header">
                                                  <i class="bi bi-book"></i>&nbsp;Recent Borrrowed Transaction
                                             </div>
                                             <div class="card-body">
                                                  <div class="table-responsive">
                                                       <table id="myDataTable" class="table table-sm">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Title</th>
                                                                      <th>Borrower</th>
                                                                      <th>Date</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <tr>
                                                                      <td>Mark</td>
                                                                      <td>Otto</td>
                                                                      <td>@mdo</td>
                                                                 </tr>
                                                                 <tr>
                                                                      <td>Jacob</td>
                                                                      <td>Thornton</td>
                                                                      <td>@fat</td>
                                                                 </tr>
                                                                 <tr>
                                                                      <td>Larry the Bird</td>
                                                                      <td>@twitter</td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                             <div class="card-footer">

                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-12 col-md-6">
                                        <div class="card border-3 border-top border-info">
                                             <div class="card-header">
                                                  <i class="bi bi-book"></i>&nbsp;Recent Returned Transaction
                                             </div>
                                             <div class="card-body">
                                                  <div class="table-responsive">
                                                       <table id="myDataTable" class="table table-sm">
                                                            <thead>
                                                                 <tr>
                                                                      <th>Title</th>
                                                                      <th>Borrower</th>
                                                                      <th>Date</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <tr>
                                                                      <td>Mark</td>
                                                                      <td>Otto</td>
                                                                      <td>@mdo</td>
                                                                 </tr>
                                                                 <tr>
                                                                      <td>Jacob</td>
                                                                      <td>Thornton</td>
                                                                      <td>@fat</td>
                                                                 </tr>
                                                                 <tr>

                                                                      <td>Larry the Bird</td>
                                                                      <td>@twitter</td>
                                                                 </tr>
                                                            </tbody>
                                                       </table>
                                                  </div>
                                             </div>
                                             <div class="card-footer">

                                             </div>
                                        </div>
                                   </div>
                              </div> -->
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