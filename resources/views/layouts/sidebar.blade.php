<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('template/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="/messages" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>
                        Pesan
                        @if (\App\Pesan::dibaca() != 0)
                            <span class="right badge badge-danger">{{ \app\Pesan::dibaca() }}</span>
                        @endif
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Master Data
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/user" class="nav-link">
                            <i class="fas fa-users-cog nav-icon"></i>

                            <p>Master User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/book" class="nav-link">
                            <i class="fas fa-book-medical nav-icon"></i>
                            <p>Master Buku/Journal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/kategori" class="nav-link">
                            <i class="fas fa-swatchbook nav-icon"></i>
                            <p>Kategori Buku/Journal</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="/password" class="nav-link">
                    <i class="nav-icon fas fa-lock"></i>
                    <p>
                        Change Password
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span style="color: Tomato;">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                    </span>
                    {{-- <i class="nav-icon fas fa-sign-out"></i> --}}
                    <p>
                        Logout
                    </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
