<?php include('./includes/header.php'); ?>



<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Admin</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>15</h6>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">
                  Books
                </h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                  </div>
                  <div class="ps-3">
                    <h6>3,264</h6>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">
                  Students
                </h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">
                  Customers
                </h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">
                  Recent Transactions
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

        </div>
      </div>

    </div>
  </section>
</main>

<?php include('./includes/footer.php'); ?>