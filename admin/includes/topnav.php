<header id="header" class="header fixed-top d-flex align-items-center">
     <!-- Logo -->
     <div class="d-flex align-items-center">
          <a href="index.html" class="logo d-flex align-items-center ">
               <img src="assets/img/mcc-logo.png" alt="" class=" mx-2" />
               <span class="d-none d-lg-block mx-2">MCC <span class="text-info">LIBRARY</span></span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
     </div>

     <!-- Search -->
     <div class="search-bar ">
          <form class="search-form d-flex align-items-center" method="POST" action="#">
               <input type="text" class="d-flex align-items-center align-middle" name="query" placeholder="Search"
                    title="Enter search keyword" />
               <button type="submit" title="Search">
                    <i class="bi bi-search"></i>
               </button>
          </form>
     </div>
     <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">
               <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                         <i class="bi bi-search"></i>
                    </a>
               </li>

               <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                         <img src="assets/img/admin.png" alt="Profile" class="rounded-circle" />
                         <span
                              class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION['auth_stud']['stud_name']; ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                         <li class="dropdown-header">
                              <h6><?= $_SESSION['auth_stud']['stud_name']; ?></h6>
                         </li>
                         <li>
                              <hr class="dropdown-divider" />
                         </li>
                         <li>
                              <a class="dropdown-item d-flex align-items-center" href="admin-profile.php">
                                   <i class="bi bi-person"></i> <span>My Profile</span>
                              </a>
                         </li>
                         <li>
                              <hr class="dropdown-divider" />
                         </li>
                         <li>
                              <a class="dropdown-item d-flex align-items-center" href="account-settings.php">
                                   <i class="bi bi-gear"></i> <span>Account Settings</span>
                              </a>
                         </li>
                         <li>
                              <hr class="dropdown-divider" />
                         </li>
                         <li>
                              <a class="dropdown-item d-flex align-items-center" href="#">
                                   <i class="bi bi-person-workspace"></i><span>Admin</span>
                              </a>
                         </li>
                         <li>
                              <hr class="dropdown-divider" />
                         </li>
                         <li>
                              <form action="../allcode.php" method="POST">

                                   <button class="dropdown-item d-flex align-items-center" name="logout_btn"
                                        type="submit">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Log Out</span>
                                   </button>

                              </form>
                         </li>

                    </ul>
               </li>
          </ul>
     </nav>
</header>