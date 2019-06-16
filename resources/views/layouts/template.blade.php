<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('frontend/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/jquery-scrollbar/jquery.scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/fullcalendar/fullcalendar.min.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('frontend/css/app.min.css') }}">

        <title>@yield('title')</title>
    </head>

    <body data-ma-theme="green">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <header class="header">
                <div class="navigation-trigger hidden-xl-up" data-ma-action="aside-open" data-ma-target=".sidebar">
                    <div class="navigation-trigger__inner">
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                        <i class="navigation-trigger__line"></i>
                    </div>
                </div>

                <div class="header__logo hidden-sm-down">
                    <h1><a href="{{ url('dashboard') }} ">Koperasi Pegawai Lemigas </a></h1>
                </div>

                <form class="search">
                    <div class="search__inner">
                        <input type="text" class="search__text" placeholder="Search for people, files, documents...">
                        <i class="zmdi zmdi-search search__helper" data-ma-action="search-close"></i>
                    </div>
                </form>

               
            </header>

            @include('layouts.menu') 

            <section class="content"> 
                @yield('content')
                @yield('script')

                

                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <footer class="footer hidden-xs-down">
                    <p>© Material Admin Responsive. All rights reserved.</p>

                    <ul class="nav footer__nav">
                        <a class="nav-link" href="">Homepage</a>

                        <a class="nav-link" href="">Company</a>

                        <a class="nav-link" href="">Support</a>

                        <a class="nav-link" href="">News</a>

                        <a class="nav-link" href="">Contacts</a>
                    </ul>
                </footer>
            </section>
        </main>

        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <!-- Javascript -->
        <!-- Vendors -->
        <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/popper.js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('frontend/vendors/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>

       


        @yield('js')

        <!-- App functions and actions -->
        <script src="{{ asset('frontend/js/app.min.js') }}"></script>
    </body>
</html>
