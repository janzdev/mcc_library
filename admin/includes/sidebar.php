<aside id="sidebar" class="sidebar" id="v-pills-tab" role="tablist">
     <?php  $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+ 1); ?>
     <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'index.php' ? 'active': '' ?>" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Statistic</span>
               </a>
          </li>

          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'books.php' ? 'active': '' ?>" href="books.php">
                    <i class="bi bi-book"></i><span>Book Collection</span>
               </a>
          </li>
          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'users.php' ? 'active': '' ?>" href="users.php">
                    <i class="bi bi-people"></i><span>Users</span>
               </a>
          </li>
          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'circulation.php' ? 'active': '' ?>" href="circulation.php">
                    <i class="bi bi-journal-album"></i><span>Circulation</span>
               </a>
          </li>
          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'report.php' ? 'active': '' ?>" href="report.php">
                    <i class="bi bi-file-earmark"></i><span>Report</span>
               </a>
          </li>
          <li class="nav-item">
               <a class="nav-link collapsed<?=$page == 'web_opac.php' ? 'active': '' ?>" href="web_opac.php">
                    <i class="bi bi-book"></i><span>Web OPAC</span>
               </a>
          </li>
     </ul>
</aside>