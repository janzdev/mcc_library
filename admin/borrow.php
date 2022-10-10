<?php include('./includes/header.php'); ?>

<!-- Modal -->
<div class="modal fade" id="userAddModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Borrow</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="saveadmin" action="" method="post">
        <div class="modal-body">

          <p class="fw-normal text-center">Book Details</p>
          <div class="input-group mb-3 input-group-sm">
            <input type="text" class="form-control" placeholder="Barcode No." aria-label="Recipient's username"
              aria-describedby="button-addon2">
            <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Search</button>
          </div>
          <div class="mb-3 input-group-sm">
            <label for="">Book Name</label>
            <input type="text" name="name" id="" class="form-control">
          </div>
          <div class="mb-3 input-group-sm">
            <label for="">Author</label>
            <input type="text" name="email" id="" class="form-control">
          </div>
          <button type="button" class="btn btn-primary">Add more</button>
          <p class=" fw-normal text-center">Borrower Details</p>
          <div class="input-group mb-3 input-group-sm">
            <input type="text" class="form-control" placeholder="School ID No." aria-label="Recipient's username"
              aria-describedby="button-addon2">
            <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Search</button>
          </div>
          <div class="mb-3 input-group-sm">
            <label for="">Firstname</label>
            <input type="text" name="phone" id="" class="form-control">
          </div>
          <div class="mb-3 input-group-sm">
            <label for="">Lastname</label>
            <input type="text" name="phone" id="" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Saved Borrower</button>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="dash-content">

  <div class="container-fluid px-4">
    <h1 class="h3 mt-2">Borrower</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
      <li class="breadcrumb-item">Admin</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Borrower List
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary  float-end" data-bs-toggle="modal"
                data-bs-target="#userAddModal" data-bs-target="#staticBackdrop">
                Add Borrower
              </button>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </div>





</div>
</div>

<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<?php include('./includes/footer.php'); ?>