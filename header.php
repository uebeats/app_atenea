<!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="resources/dist/img/logo-negro.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="resources/dist/img/logo-negro.png"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Amount Administracion -->
          <?php
            $end = date('Y-m-d');

            $query = "SELECT * FROM tbl_property_system WHERE date_register BETWEEN '01-01-2019' AND '$end'";
            $resultado = $con->query($query);

            $suma_comision = 0;
            $suma_canon = 0;

            while ($data = $resultado->fetch_assoc()){
              $total_canon = $data['canon_price'];
              $total_comision = $data['comision_canon'];
              $suma_comision+=$total_comision;
              $suma_canon+=$total_canon;
            }
          ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               Comisión : <?php 
              echo '$' . number_format($suma_comision,0 , " ", ".");?>
            </a>
          </li>
          <!-- Amount Arriendos -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Arriendos : <?php 
              echo '$' . number_format($suma_canon,0 , " ", ".");?>
            </a>
          </li>
          <!-- Amount Arriendos -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes 0 notificaciones</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="resources/dist/img/icon-user.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php nameUser($_SESSION['user_system']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="resources/dist/img/icon-user.png" class="img-circle" alt="User Image">

                <p>
                  <?php nameUser($_SESSION['user_system']);?>
                  <small><?php echo $_SESSION['user_system'];?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn bg-olive"><i class="fa fa-user"></i> Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="model/cerrarSession.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Salir</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>