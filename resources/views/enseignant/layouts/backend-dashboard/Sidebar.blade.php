<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary navbar-navy elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home.internaute')}}" class="brand-link bg-navy">
    <img src="{{asset('img/icone2.jpg')}}" alt="zfreeschool Logo" class="img-fluid brand-image img-circle elevation-3"
         style="opacity: .6">
    <span class="brand-text font-weight-light">ZFreeSchool</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link bg-olive">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Action des enseignants
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav-item nav-treeview flex-column pl-2">
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gestion des cours
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav-item nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('affiche.cours')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> creer un cours</p>
                  </a>
                </li>
                <li class="nav-item" hidden>
                  <a href="{{route('matiere.afficher')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>modifier un cours</p>
                  </a>
                </li>
                <li class="nav-item" hidden>
                  <a href="{{route('matiere.afficher')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>suprimer un cours</p>
                  </a>
                </li>
              </ul>
            </li>

            
          </ul>
        </li>
       

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
