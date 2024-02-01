<nav class="navbar navbar-expand navbar-light bg-gradient-dark topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fas fa-bars text-white"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white">{{ Auth::user()->name }}</span>
                <!-- Uncomment the following line if you want to display a user profile image -->
                <!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu bg-dark dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item text-light" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-light"></i>
                    Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item bg-dark text-light" href="#" onclick="event.preventDefault();
                        this.closest('form').submit();" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-light"></i>
                        Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
