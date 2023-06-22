<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-olive navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
          <h4 class="m-1 text-dark"><img src="{{asset('img/icone2.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 img-fluid"
            style="border-right: solid 2px rgb(51, 51, 51); opacity: .7;" width="30px" >ZFreeSchool</h4>
      </li>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home.internaute')}}" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto info">
      <!-- Messages Dropdown Menu -->
          <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="#">{{ __('se connecter') }}</a>
                    </li>
                @endif
                
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link btn-register" href="#">{{ __('s\'enregistrer') }}</a>
                    </li>
                @endif
            @else
            <img src="{{asset('img/cours-info2.jpg')}}" class="img-circle elevation-2" alt="User Image" style="opacity: .7">
            <a href="#" class="d-block ml-2">{{ Auth::user()->nom }}</a>
          @endguest
      <li>
          <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->