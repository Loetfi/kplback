 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-mobile"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KP Lemigas <sup>Apps</sup></div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('dashboard_mobile') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Mobile</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">

        

        
        <!-- Heading -->
        
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard_mobile/anggota') }} ">
                <i class="fas fa-fw fa-user"></i>
                <span>Anggota</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard_mobile/cashflow_toko') }} ">
                <i class="fas fa-fw fa-store"></i>
                <span>Cashflow Toko</span>
            </a> 
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('dashboard_mobile/cashflow_simpin') }} ">
                <i class="fas fa-fw fa-money-check-alt"></i>
                <span>Cashflow Simpan Pinjam</span>
            </a> 
        </li>
 
        
        
        
        <!-- Nav Item - Pages Collapse Menu -->

        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
    </ul>
    <!-- End of Sidebar -->
    
