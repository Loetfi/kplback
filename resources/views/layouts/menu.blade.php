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
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin Dashboard</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">

        
       
        
        <!-- Heading -->
        
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-percent"></i>
                <span>Manajemen Promo</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    
                    <a class="collapse-item @if (Request::segment(1) === 'promo' ) navigation__active @endif" href="{{ route('promo') }}"><i class="fas fa-fw fa-percent"></i> Promo</a>
                </div>
            </div>
        </li>
        
        <div class="sidebar-heading">
            Manajemen Order
        </div> 
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseOrder">
                <i class="fas fa-fw fa-store"></i>
                <span>Manajemen Order</span>
            </a>
            <div id="collapseOrder" class="collapse" aria-labelledby="headingUtilities" data-parent="#collapseOrder">
                <div class="bg-white py-2 collapse-inner rounded">
                    
                    <a class="collapse-item @if (Request::segment(1) === 'toko' ) navigation__active @endif" href="{{ route('toko') }}"><i class="fas fa-fw fa-store"></i> Toko</a>
                    <a class="collapse-item @if (Request::segment(1) === 'travel' ) navigation__active @endif" href="{{ route('travel') }}"><i class="fas fa-fw fa-ticket-alt"></i> Tiketing</a>
                    <a class="collapse-item @if (Request::segment(1) === 'topup' ) navigation__active @endif" href="{{ route('topup') }}"><i class="fas fa-fw fa-mobile"></i> Top Up</a>
                    <a class="collapse-item @if (Request::segment(1) === 'simpanan' ) navigation__active @endif" href="{{ route('topup') }}"><i class="fas fa-fw fa-money-check-alt"></i> Simpanan</a>
                    <a class="collapse-item @if (Request::segment(1) === 'pinjaman' ) navigation__active @endif" href="{{ route('topup') }}"><i class="fas fa-fw fa-balance-scale"></i> Pinjaman</a>
                    
                </div>
            </div>
        </li>
         
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNews" aria-expanded="true" aria-controls="collapseNews">
                <i class="fas fa-fw fa-file"></i>
                <span>Manajemen Berita</span>
            </a>
            <div id="collapseNews" class="collapse" aria-labelledby="headingUtilities" data-parent="#collapseNews">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item @if (Request::segment(1) === 'toko' ) navigation__active @endif" href="{{ route('toko') }}"><i class="fas fa-fw fa-plus"></i> Tambah Berita</a>
                    <a class="collapse-item @if (Request::segment(1) === 'promo' ) navigation__active @endif " href="{{ route('promo') }}"><i class="fas fa-fw fa-list"></i> List Berita</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Dashboard Apps</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#collapsePages">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item @if (Request::segment(1) === 'toko' ) navigation__active @endif" href="{{ route('toko') }}"><i class="fas fa-fw fa-chart-bar"></i> Dashbooard</a>
                    </div>
                </div>
            </li>


        {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                     
                </div>
            </li> --}}

        
        
        
        <!-- Nav Item - Pages Collapse Menu -->
      
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        
    </ul>
    <!-- End of Sidebar -->
    