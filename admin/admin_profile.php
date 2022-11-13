<?php
include('authentication.php');
include('includes/header.php');
include('includes/sidebar.php'); 
?>

<main id="main" class="main">
     <div class="pagetitle">
          <h1>Profile</h1>
          <nav>
               <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
               </ol>
          </nav>
     </div>
     <section class="section profile">
          <div class="row">
               <div class="col-xl-4">
                    <div class="card">
                         <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                              <h2>JanDev</h2>
                              <h3>Admin</h3>

                         </div>
                    </div>
               </div>
               <div class="col-xl-8">
                    <div class="card">
                         <div class="card-body pt-3">
                              <ul class="nav nav-tabs nav-tabs-bordered">
                                   <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab"
                                             data-bs-target="#profile-overview">Overview</button></li>

                              </ul>
                              <div class="tab-content pt-2">
                                   <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam
                                             maiores cumque temporibus.
                                             Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae
                                             quisquam autem eveniet
                                             perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                                        <h5 class="card-title">Profile Details</h5>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                             <div class="col-lg-9 col-md-8">Ordep</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Company</div>
                                             <div class="col-lg-9 col-md-8">Devcon</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Job</div>
                                             <div class="col-lg-9 col-md-8">Web Developer</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Country</div>
                                             <div class="col-lg-9 col-md-8">Philippines</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Address</div>
                                             <div class="col-lg-9 col-md-8">Poblacion, Santa Fe, Cebu</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Phone</div>
                                             <div class="col-lg-9 col-md-8">(469) 963-211 x5100</div>
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-3 col-md-4 label">Email</div>
                                             <div class="col-lg-9 col-md-8"><a href="/cdn-cgi/l/email-protection"
                                                       class="__cf_email__"
                                                       data-cfemail="e982c788878d8c9b9a8687a98c91888499858cc78a8684">[email&#160;protected]</a>
                                             </div>
                                        </div>
                                   </div>



                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <?php
include('includes/footer.php');
include('./includes/script.php');
?>