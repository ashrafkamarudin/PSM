<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><h1>E - MSRC</h1></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('manage.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Halaman Utama </a>
                </li>
                <h3 class="menu-title">Isi Kandungan</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Buku</a>
                    <ul class="sub-menu children dropdown-menu">
                        @permission('create-books')
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('books.create') }}">Tambah</a></li>
                        @endpermission
                        @permission('read-books')
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('books.index') }}">Senarai Buku</a></li>
                        @endpermission
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-user"></i>Pelajar</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('students.create') }}">Daftar Pelajar</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('students.index') }}">Senarai Pelajar</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Sirkulasi Buku</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Sirkulasi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href=" {{ route('circulation.borrow') }} ">Pinjam</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href=" {{ route('circulation.return') }} ">Pulang</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-agenda"></i>Rekod Sirkulasi</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon ti-files"></i><a href=" {{ route('circulation.index') }} ">Sekarang</a></li>
                        <li><i class="menu-icon ti-archive"></i><a href=" {{ route('circulation-history.index') }} ">Terdahulu</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Pengurusan</h3><!-- /.menu-title -->

                
                <li>
                    @permission('read-users')
                    <a href="{{ route('users.index') }}"> <i class="menu-icon ti-user"></i>Akaun Pengguna </a>
                    @endpermission
                </li>

                <li>
                    @permission('read-report')
                    <a href="{{ route('report.index') }}"> <i class="menu-icon ti-bar-chart"></i>Laporan Daftar Masuk </a>
                    @endpermission
                </li>

                @role('superadministrator')
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Peranan & Kebenaran</a>
                    <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{ route('roles.index') }}">Peranan</a></li>
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{ route('permissions.index') }}">Kebenaran</a></li>
                    </ul>
                </li>
                @endrole
                
                <h3 class="menu-title">Fungsi Tambahan</h3><!-- /.menu-title -->
                <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-sign-out"></i>
                        Log Keluar
                    </a>
                    @include('_includes.forms.logout')
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>