<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
    <div class="container">
        <a href="/" class="navbar-brand">
            {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">DigiLib RSUP Surakarta</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">Dokumen</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @foreach (\App\Kategori::dokumen() as $list)
                            <li><a href="#" class="dropdown-item">{{ $list->nama }} </a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/kontak" class="nav-link">Kontak</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> --}}
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            @guest
                <li class="nav-item">
                    <a href="/register" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">{{ Auth::user()->name }}</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        @if (Auth::user()->akses == '1')
                            <li><a href="/home" class="dropdown-item"><i class="fas fa-tachometer-alt"></i> Home</a></li>
                        @endif
                        <li><a href="#" class="dropdown-item"
                                onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                        {{-- <li><a href="#" class="dropdown-item">Some other action</a></li> --}}
                    </ul>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest

        </ul>
    </div>
</nav>
