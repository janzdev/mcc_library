<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<!-- View Table Books Start -->
<main id="main" class="main">
     <div class="col-12  ">
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
               <div class="card-body mt-2  ">
                    <div class="table-responsive">
                         <table id="myDataTable" class="table table-bordered table-striped mytable">
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


                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</main>
<!-- View Table Books End -->


<?php 
include('./includes/footer.php');

include('./includes/script.php');
include('../message.php');
?>

<script type="text/javascript">
$(document).ready(function() {
     $('#myDataTable').DataTable({
          "fnCreatedRow": function(nRow, aData, iDataIndex) {
               $(nRow).attr('book_id', aData[0]);
          },
          'responsive': 'true',
          'serverSide': 'true',
          'processing': 'true',
          'paging': 'true',
          'order': [],
          'ajax': {
               'url': 'admin_code.php',
               'type': 'POST',
          },
          "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [7]
               },

          ]
     });
});
// Add User
// $(document).on('submit', '#addBook', function(e) {
//      e.preventDefault();
//      var city = $('#addCityField').val();
//      var username = $('#addUserField').val();
//      var mobile = $('#addMobileField').val();
//      var email = $('#addEmailField').val();
//      if (city != '' && username != '' && mobile != '' && email != '') {
//           $.ajax({
//                url: "add_user.php",
//                type: "post",
//                data: {
//                     city: city,
//                     username: username,
//                     mobile: mobile,
//                     email: email
//                },
//                success: function(data) {
//                     var json = JSON.parse(data);
//                     var status = json.status;
//                     if (status == 'true') {
//                          mytable = $('#example').DataTable();
//                          mytable.draw();
//                          $('#addUserModal').modal('hide');
//                     } else {
//                          alert('failed');
//                     }
//                }
//           });
//      } else {
//           alert('Fill all the required fields');
//      }
// });
</script>