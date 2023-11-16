<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ url('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/icon128.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="20">
                    </span>
                </a>

                <a href="{{ url('/') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('/assets/images/icon128.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="@lang('dashboard.search')...">
                    <span class="uil-search"></span>
                </div>
            </form>
        </div>



        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="uil-bell"></i>
                    <span class="badge badge-danger badge-pill"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-16"> Notifications </h5>
                            </div>
                            <div class="col-auto">
                                {{-- <a href="#!" class="small"> Mark all as read</a> --}}
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">



                    </div>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="#">
                            <i class="uil-arrow-circle-right mr-1"></i> View More..
                        </a>
                    </div>
                </div>
            </div>
            <div class="dropdown d-inline-block language-switch">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @php $locale = session()->get('locale'); @endphp
                    @switch($locale)
                    @case('ar')
                    <img src="{{ URL::asset('assets/images/flags/ar.png')}}" alt="Header Language" height="16">
                    @break
                    @default
                    <img src="{{ URL::asset('assets/images/flags/en.png')}}" alt="Header Language" height="16">
                    @endswitch
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    <!-- item-->
                    <a hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="dropdown-item notify-item">
                        <img src="{{ URL::asset('assets/images/flags/en.png')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">English</span>
                    </a>

                    <!-- item-->
                    <a hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="dropdown-item notify-item">
                        <img src="{{ URL::asset('assets/images/flags/ar.png')}}" alt="user-image" class="mr-1" height="12"> <span class="align-middle">العربية</span>
                    </a>

                </div>

                <!-- @if (LaravelLocalization::getCurrentLocale() == 'en')
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    English <i class="fa fa-globe"> </i>
                </a>
                @elseif(LaravelLocalization::getCurrentLocale() == 'ar')
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    العربية <i class="fa fa-globe"></i>
                </a>
                @endif


                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @foreach (array_reverse(LaravelLocalization::getSupportedLocales()) as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}" class="dropdown-item language-flag-container">
                        <span class=" text-muted text-sm d-block">{{ $properties['native'] }}</span>

                        <img class="language-flag d-block" src="{{ asset('assets/images/flags/' . $localeCode . '.png') }}" />

                    </a>
                    <div class="dropdown-divider"></div>
                    @endforeach
                </div> -->

            </div>
            <!-- Full Screen  -->
            <div class="dropdown d-none d-lg-inline-block ml-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="uil-minus-path"></i>
                </button>
            </div>
            <!-- End Full Screen  -->

            <a id="logout" class="dropdown-item" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">@lang('dashboard.logout')</span></a>
            <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                @csrf
                @method('POST')
            </form>
        </div>
</header>