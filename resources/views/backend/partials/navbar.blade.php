<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-1.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-1.png') }}" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend/assets/images/logo-1.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend/assets/images/logo-1.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard') }}" class="tp-link">Admin Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.manager') }}" class="tp-link">Manager Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.employee') }}" class="tp-link">Employee Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.adv-user') }}" class="tp-link">Adv-User Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title">Pages</li>
                <li>
                    <a href="#sidebarcategories" data-bs-toggle="collapse">
                        <i class="mdi mdi-arrow-decision-outline"></i>
                        <span> Categories </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarcategories">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('categories.index') }}" class="tp-link">Category</a>
                            </li>
                            <li>
                                <a href="{{ route('subcategories.index') }}" class="tp-link">Sub Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>