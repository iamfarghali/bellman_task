<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 text-capitalize">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{route('companies.index')}}"
                       class="nav-link @if(request()->is('companies/*') || request()->is('companies') ) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('app.companies')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('companies.index')}}"
                               class="nav-link  @if(request()->is('companies')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>  {{__('app.companies')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('companies.create')}}"
                               class="nav-link @if(request()->is('companies/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('app.add') . ' ' . __('app.company')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{route('employees.index')}}"
                       class="nav-link @if(request()->is('employees/*') || request()->is('employees') ) active @endif">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            {{__('app.employees')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('employees.index')}}"
                               class="nav-link @if(request()->is('employees')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>  {{__('app.employees')}}</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('employees.create')}}"
                               class="nav-link @if(request()->is('employees/create')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('app.add') . ' ' . __('app.employee')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
