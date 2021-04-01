  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../../Residencias_V1/Assets/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../../Residencias_V1/Assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block"><?php print_r($_SESSION['userData']['nombre_usuario'])  ?></a>
          <a class="d-block"><?php print_r($_SESSION['userData']['nombre_rol'])  ?></a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <?php

        if($_SESSION['userData']['idrol'] == 1){
         
        }


        ?>

          <li class="nav-item">
            <a href="<?php echo BASE_URL.'Usuarios/Home'?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i> 
              <p>
                Administracion de usuarios
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo BASE_URL.'Proyecto/Home'?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i> 
              <p>
                Administracion de proyectos
                
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo BASE_URL.'Equipos/Home'?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i> 
              <p>
                Administracion de equipos
                
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?php echo BASE_URL.'/Logout'?>" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Cerrar sesion
                
              </p>
            </a>
          </li>


        </ul>
      </nav>
    </div>
  </aside>