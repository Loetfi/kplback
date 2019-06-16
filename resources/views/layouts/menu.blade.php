<aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="{{ asset('frontend/demo/img/profile-pics/8.jpg') }} " alt="">
                            <div>
                                <div class="user__name">Malinda Hollaway</div>
                                <div class="user__email">malinda-h@gmail.com</div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="">View Profile</a>
                            <a class="dropdown-item" href="">Settings</a>
                            <a class="dropdown-item" href="">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="@if (Request::segment(1) === 'dashboard' ) navigation__active @endif"><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>

                        <li class="@if (Request::segment(1) === 'promo' ) navigation__active @endif ">
                            <a href="{{ route('promo') }}"><i class="zmdi zmdi-view-week"></i> Management Promo</a>
                        </li>
                        <li class="@if (Request::segment(1) === 'toko' ) navigation__active @endif">
                            <a href="{{ route('toko') }}"><i class="zmdi zmdi-store"></i> Management Order Toko</a>
                        </li>
                        <li class="@if (Request::segment(1) === 'travel' ) navigation__active @endif">
                            <a href="{{ route('travel') }}"><i class="zmdi zmdi-view-list-alt"></i> Management Order Travel</a>
                        </li>
                        <li class="@if (Request::segment(1) === 'topup' ) navigation__active @endif">
                            <a href="{{ route('topup') }}"><i class="zmdi zmdi-smartphone-android"></i> Management Order Tagihan</a>
                        </li>
                    </ul>
                </div>
            </aside>
