<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="resources/dist/img/icon-user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php nameUser($_SESSION['user_system']);?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ NAVEGACIÓN</li>
        <!-- Optionally, you can add icons to the links -->

        <!-- escritorio -->
        <li class="<?php echo $active_dash;?>"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a></li>
        <!-- contactos -->
        <li class="treeview <?php echo $active_client;?>">
          <a href="#"><i class="fa fa-user"></i><span>Contactos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="gestionOwner.php"><i class="fa fa-navicon"></i> Propietarios</a></li>
            <li><a href="gestionClient.php"><i class="fa fa-navicon"></i> Clientes</a></li>

          </ul>
        </li>
        <!-- administración -->
        <li class="<?php echo $active_property;?>"><a href="gestionProperty.php"><i class="fa fa-building"></i> <span>Administración</span></a></li>
        <!-- documentos -->
        <li class="treeview menu-open <?php echo $active_docs;?>" style="height: auto;">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Documentos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li><a href="gestionRend.php"><i class="fa fa-circle-o"></i> Rendiciones</a></li>
            <li class="treeview" style="height: auto;">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" style="display: none;">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <!-- configuraciones-->
        <li class="<?php echo $active_option;?>"><a href="optionSystem.php"><i class="fa fa-cog"></i> <span>Configuraciones</span></a></li>
        

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->