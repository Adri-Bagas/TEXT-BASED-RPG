<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tables
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash/race') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Race</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash/class') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Class</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash/item') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Item</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash/start-scene') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Start Scenes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dash/scenarios') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Scenarios</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>