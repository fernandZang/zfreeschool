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
              Action du proviseur
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav-item nav-treeview flex-column pl-2">
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gerer les niveaux
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav-item nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('niveau.creer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>creer un niveaux</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('niveau.afficher')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>afficher les niveaux</p>
                  </a>
                </li>
              </li>
              <li class="nav-item">
                <a href="{{route('matiere.niveau.creer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ajouter matieres</p>
                </a>
              </li>
                <li class="nav-item" hidden>
                  <a href="{{route('niveau.supprimer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>suprimer un niveaux</p>
                  </a>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gerer les enseignants
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('enseignant.valider')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>valider enseignants</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('enseignant.valide')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>enseignants validés</p>
                  </a>
                </li>
                <li class="nav-item" hidden>
                  <a href="{{route('enseignant.grade')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>changer les grades</p>
                  </a>
                </li>
                <li class="nav-item" hidden>
                  <a href="{{route('enseignant.supprimer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>suprimer un enseignant</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gerer les matieres
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                </li>
                <li class="nav-item">
                  <a href="{{route('matiere.afficher')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>afficher les matieres</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('matiere.creer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>creer une matiere</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link bg-olive">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Action du censeur
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav-item nav-treeview flex-column pl-2">
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  projet pedagogique
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                <li class="nav-item dropdown">
                  <a href="{{route('matiere.niveau.projet.voir')}}" class="nav-link"  role="button">
                    <i class="far fa-circle nav-icon"></i>
                    <p>creer projet pedagogique</p>
                  </a>
                  
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview" hidden>
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  valider les Cours
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('classe.creer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>cours nom validés</p>
                  </a>
                </li>
              </ul>
            </li>
          
            <li class="nav-item has-treeview" hidden>
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gerer les Eleves
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('classe.creer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>valider les eleves</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('classe.modifier')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>modifier la classe</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('classe.supprimer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>modifier le niveau</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview" hidden>
              <a href="#" class="nav-link bg-info">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  gerer les classes
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview pl-2">
                <li class="nav-item">
                  <a href="{{route('classe.creer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>creer une classe</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('classe.modifier')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>modifier une classe</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('classe.supprimer')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>suprimer une classe</p>
                  </a>
                </li>
              </ul>
            </li>

            
          </ul>
        </li>


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
