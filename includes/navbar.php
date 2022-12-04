<?php session_start(); ?>
<nav class="navbar navbar-expand-lg" style="background: #0096FF;">
     <div class="container-fluid mx-5">
          <img src="assets/img/mcc-logo.png" alt="logo" class=" mx-2" height="40px" width="40px" />
          <a class="navbar-brand text-white fw-bold fs-5" href="#">MCC</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                         <a class="nav-link active text-white fw-semibold" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active text-white fw-semibold" aria-current="page" href="#">About</a>
                    </li>
                    <?php if(isset($_SESSION['auth_stud'])) :?>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <span><?= $_SESSION['auth_stud']['stud_name']; ?></span>
                         </a>
                         <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">
                                        <i class="bi bi-person"></i> My Profile</a></li>
                              <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                              <li>
                                   <hr class="dropdown-divider">
                              </li>
                              <li>
                                   <form action="allcode.php" method="POST">
                                        <button type="submit" name="logout_btn" class="dropdown-item"><i
                                                  class="bi bi-box-arrow-right"></i> Logout</button>
                                   </form>
                              </li>
                         </ul>
                    </li>
                    <?php else :?>
                    <li class="nav-item">
                         <a href="login.php" class="nav-link text-white fw-semibold">Login</a>
                    </li>
                    <li class="nav-item">
                         <a href="signup.php"
                              class="nav-link text-white bg-info px-3 fw-semibold rounded-pill">Signup</a>
                    </li>
                    <?php endif; ?>
               </ul>
          </div>
     </div>
</nav>