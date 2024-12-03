<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/images/logo-dark.png') }}" alt="" height="21">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('/images/logo-light.png') }}" alt="" height="21">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar" data-simplebar="init" class="h-100 simplebar-scrollable-y">
        <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
                <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                    <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                        style="height: 100%; overflow: hidden scroll;">
                        <div class="simplebar-content" style="padding: 0px;">
                            <div class="container-fluid">

                                <div id="two-column-menu"></div>
                                
                                {{-- Menu --}}
                                <ul class="navbar-nav" id="navbar-nav" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                                                        <li class="nav-item">
                                                            <a class="nav-link menu-link {{ request()->is('/') ? 'active' : '' }}"
                                                                href="{{ route('home') }}">
                                                                <i class="las la-house-damage"></i> <span data-key="t-dashboard">Dashboard</span>
                                                            </a>
                                                        </li>
                                                        @role('super-admin')
                                                            <li class="nav-item">
                                                                <a class="nav-link menu-link {{ request()->is('users', 'users/*') ? 'active' : '' }}" href="#sidebarUsermanagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUsermanagement">
                                                                    <i class="las la-users"></i> <span data-key="t-users">Users</span>
                                                                </a>
                                                                <div class="collapse menu-dropdown {{ request()->is('users', 'users/*') ? 'show' : '' }}" id="sidebarUsermanagement">
                                                                    <ul class="nav nav-sm flex-column">
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('users') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}" data-key="t-users"> System Users </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link menu-link {{ request()->is('reports', 'reports/*') ? 'active' : '' }}" href="#sidebarReports" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarReports">
                                                                    <i class="bi bi-file-earmark-bar-graph"></i> <span data-key="t-reports">Reports</span>
                                                                </a>
                                                                <div class="collapse menu-dropdown {{ request()->is('reports', 'reports/*') ? 'show' : '' }}" id="sidebarReports">
                                                                    <ul class="nav nav-sm flex-column">
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('users.details') }}" class="nav-link {{ request()->is('reports') ? 'active' : '' }}" data-key="t-users"> Users Activity Reports </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        @endrole
                                                        @role('user')
                                                            <li class="nav-item">
                                                                <a class="nav-link menu-link {{ request()->is('companies', 'companies/*') ? 'active' : '' }}" href="#sidebarCompaniesManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCompaniesManagement">
                                                                    <i class="bi bi-building"></i> <span data-key="t-companies">Companies</span>
                                                                </a>
                                                                <div class="collapse menu-dropdown {{ request()->is('companies', 'companies/*') ? 'show' : '' }}" id="sidebarCompaniesManagement">
                                                                    <ul class="nav nav-sm flex-column">
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('company.create') }}" class="nav-link {{ request()->is('companies/create') ? 'active' : '' }}" data-key="t-users">Create New Company</a>
                                                                        </li>
                                                                        <li class="menu-title"><span data-key="t-owned">Owned</span></li>
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('owned.companies') }}" class="nav-link {{ request()->is('companies/ownedcompanies', 'companies/ownedcompanies/*') ? 'active' : '' }}" data-key="t-users">Owned Companies</a>
                                                                        </li>
                                                                        <li class="menu-title"><span data-key="t-working-at">Working At</span></li>
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('companies') }}" class="nav-link {{ request()->is('companies/joinedcompanies') ? 'active' : '' }}" data-key="t-users">Joined Companies</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        @endrole
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 260px; height: 932px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal">
                                        <div class="simplebar-scrollbar"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical">
                                        <div class="simplebar-scrollbar"></div>
                                    </div>
                                </ul>                                

                            </div>
                            <!-- Sidebar -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="simplebar-placeholder" style="width: 260px; height: 932px;"></div>
        </div>
        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
        </div>
        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
                style="height: 71px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
