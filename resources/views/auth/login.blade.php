<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('frontend/vendors/material-design-iconic-font/css/material-design-iconic-font.min.css')  }}">
        <link rel="stylesheet" href="{{ asset('frontend/vendors/animate.css/animate.min.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('frontend/css/app.min.css') }}">
    </head>

    <body data-ma-theme="green">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Hi there! Please Sign in 
                </div>

                <div class="login__block__body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-group form-group--float form-group--centered">
                        <input type="text" class="form-control" name="username">
                        <label>Email Address</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <div class="form-group form-group--float form-group--centered">
                        <input type="password" class="form-control" name="password">
                        <label>Password</label>
                        <i class="form-group__bar"></i>
                    </div>

                    <button class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
                </form>
                </div>
            </div>
  
        </div>

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

        <!-- App functions and actions -->
        <script src="{{ asset('frontend/js/app.min.js') }}"></script>
    </body>
</html>
