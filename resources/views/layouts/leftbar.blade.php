<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ url('/') }}" class="logo logo-large"><img src="{{ asset('images/logo.png') }}"
                    class="img-fluid" alt="logo"></a>
            <a href="{{ url('/') }}" class="logo logo-small"><img src="{{ asset('images/logo.png') }}"
                    class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                @if (session('admin_id') != '')
                    <li>
                        <a href="{{ route('back.of.user') }}" class="text-danger">
                            <img src="{{ asset('assets/images/svg-icon/logout.svg') }}" class="img-fluid text-danger"
                                alt="Logout"><span>Go Back</span>
                        </a>
                    </li>
                @endif
                <li>
                    <a href="{{ url('/admin/home') }}" class=" @if (\Route::current()->getName() == 'admin.home') active @endif">
                        <i class="feather icon-bar-chart-2"></i>
                        <span>Dashboard</span>
                    </a>

                </li>
                @can('view users')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.users.index') active @endif" href="{{ route('admin.users.index') }}">
                            <i class="feather icon-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan
                <li>
                    <a href="{{route('admin.tenants.index')}}">
                        <i class="feather icon-layers"></i>
                        <span>Tenants</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.offices.index')}}">
                        <i class="feather icon-database"></i>
                        <span>Offices</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="feather icon-check-square"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="feather icon-book-open"></i>
                        <span>Reports</span>
                    </a>
                </li>
                @can('view services')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.services.index') active @endif"
                            href="{{ route('admin.services.index') }}">
                            <i class="feather icon-book-open"></i>
                            <span>Service</span>
                        </a>
                    </li>
                @endcan
                @can('view companies')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.companies.index') active @endif"
                            href="{{ route('admin.companies.index') }}">
                            <i class="feather icon-layers"></i>
                            <span>Companies</span>
                        </a>
                    </li>
                @endcan
                @can('view vendors')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.vendors.index') active @endif"
                            href="{{ route('admin.vendors.index') }}">
                            <i class="feather icon-user-plus"></i>
                            <span>Vendors</span>
                        </a>
                    </li>
                @endcan
                @can('view agents')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.agents.index') active @endif"
                            href="{{ route('admin.agents.index') }}">
                            <i class="feather icon-user-plus"></i>
                            <span>Consultants</span>
                        </a>
                    </li>
                @endcan
                @can('view tasks')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.tasks.index') active @endif" href="{{ route('admin.tasks.index') }}">
                            <i class="feather icon-user-plus"></i>
                            <span>Tasks</span>
                        </a>
                    </li>
                @endcan
                @can('view leads')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.leads.index') active @endif" href="{{ route('admin.leads.index') }}">
                            <i class="feather icon-check-square"></i>
                            <span>Leads</span>
                        </a>
                    </li>
                @endcan
                @can('view projects')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.projects.index') active @endif"
                            href="{{ route('admin.projects.index') }}">
                            <i class="feather icon-users"></i>
                            <span>Projects</span>
                        </a>
                    </li>
                @endcan
                @can('view invoices')
                    <li>
                        <a class="@if (\Route::current()->getName() == 'admin.invoices.index') active @endif"
                            href="{{ route('admin.invoices.index') }}">
                            <i class="feather icon-users"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                @endcan
                @can('view clients')
                    <li>
                        <a href="javaScript:void();">
                            <i class="feather icon-users"></i>
                            <span>Clients</span>
                            <i class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            <li><a class="@if (\Route::current()->getName() == 'admin.clients.index') active @endif"
                                    href="{{ route('admin.clients.index') }}">Clients</a></li>
                            <li><a class="@if (\Route::current()->getName() == 'admin.clients.visits') active @endif"
                                    href="{{ route('admin.clients.visits') }}">Client Visits</a></li>
                        </ul>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
