    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar sticky-top shadow d-flex justify-content-between">

          <!-- Sidebar Toggle (Topbar) -->
          <div class="hamburguer navbar-left">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
              <i class="fa fa-bars menu-ham"></i>
            </button>
          </div>
          <a class="navbar-brand router-link-exact-active active" href="/FluxBox/admin/home.php">
            <div class="imagem-logo"></div>
          </a>

          <!-- Topbar Navbar -->
          <ul class="user d-flex justify-content-end  navbar-nav opcoes">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small name"><?php echo $_SESSION['nome']; ?></span>
                <img class="img-profile rounded-circle" src="https://th.bing.com/th/id/OIP.8_K4eaDwgfplSLYOh6b1rAHaEK?pid=ImgDet&rs=1">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/FluxBox/admin/editar-usuario.php?id=<?php echo $_SESSION['id'] ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Perfil
                  </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="acoes/usuarios/logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>
        </nav>
        <!-- End of Topbar -->