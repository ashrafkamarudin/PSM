<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('manage.dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Content</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Books</a>
                    <ul class="sub-menu children dropdown-menu">
                        @permission('create-books')
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('books.create') }}">Add New</a></li>
                        @endpermission
                        @permission('read-books')
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('books.index') }}">List</a></li>
                        @endpermission
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Students</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('students.create') }}">Register - Manually</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{ route('students.index') }}">List</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('circulation.index') }}"> <i class="menu-icon ti-user"></i>Rekod Sirkulasi </a>
                </li>

                <h3 class="menu-title">Manage</h3><!-- /.menu-title -->

                
                <li>
                    @permission('read-users')
                    <a href="{{ route('users.index') }}"> <i class="menu-icon ti-user"></i>Users </a>
                    @endpermission
                </li>

                @role('superadministrator')
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Permission & Roles</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{ route('permissions.index') }}">Permission</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="{{ route('roles.index') }}">Roles</a></li>
                    </ul>
                </li>
                @endrole
                
                <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Circulation</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href=" {{ route('circulation.borrow') }} ">Borrow</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href=" {{ route('circulation.return') }} ">Return</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-sign-out"></i>
                        Logout
                    </a>
                    @include('_includes.forms.logout')
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>