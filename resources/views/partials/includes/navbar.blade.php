@php
    $profileImage = Auth::user()->profile ? Auth::user()->profile : 'user_profile.png';
    $employee = App\Models\Employee::where('id', auth()->user()->employee_id)->first();
@endphp
<!-- Navbar -->

{{--@if(!Route::currentRouteName('homepage')) main-header @endif--}}
<nav class="main-header navbar navbar-expand navbar-dark navbar-success sticky-top text-sm border-bottom-0">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


{{--    <div class="form-inline">--}}
{{--        <div class="input-group" data-widget="sidebar-search">--}}
{{--            <input class="form-control form-control-sidebar" type="search"--}}
{{--                   placeholder="{{ trans('site.search_in_app') }}..." aria-label="Search">--}}
{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-sidebar">--}}
{{--                    <i class="fas fa-search fa-fw"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <form class="form-inline ml-3">--}}
{{--        <div class="input-group input-group-sm">--}}
{{--            <input class="form-control form-control-navbar search-background-color" type="search" placeholder="Search"--}}
{{--                   aria-label="Search">--}}

{{--            <div class="input-group-append">--}}
{{--                <button class="btn btn-navbar" type="submit">--}}
{{--                    <i class="fas fa-search"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </form>--}}

<!-- Right navbar links -->
    <ul class="navbar-nav @if (app()->getLocale() == 'ar') mr-auto-navbav @else ml-auto @endif ">

        {{-- search bar --}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" data-widget="navbar-search" href="#" role="button">--}}
        {{--                <i class="fas fa-search text-white fa-1x"></i>--}}
        {{--            </a>--}}

        {{--            <div class="navbar-search-block">--}}
        {{--                <form class="form-inline">--}}
        {{--                    <div class="input-group input-group-sm">--}}
        {{--                        <input class="form-control form-control-navbar search-background-color" name="search222"--}}
        {{--                               type="search"--}}
        {{--                               placeholder="{{ trans('site.search_in_project') }}..." aria-label="Search">--}}

        {{--                        <div class="input-group-append">--}}
        {{--                            <button class="btn btn-navbar" type="submit">--}}
        {{--                                <i class="fas fa-search text-white"></i>--}}
        {{--                            </button>--}}

        {{--                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">--}}
        {{--                                <i class="fas fa-times text-white"></i>--}}
        {{--                            </button>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </form>--}}
        {{--            </div>--}}
        {{--        </li>--}}
        {{-- end search bar --}}


        {{--        @if(auth()->user()->user_type_id == 1)--}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell pr-1" style="color: #ededed; font-size: 1.2em;"></i>

                <span class="badge badge-warning navbar-badge font-weight-bolder data-count"
                      style="top: 0 !important; background-color: #fdd86b; !important; font-size: .9rem;">{{count(notifications())}}
                </span>
            </a>
            <div class="dropdown-menu dropdown-notifications dropdown-menu-lg dropdown-menu-right">

                <span
                    class="dropdown-item dropdown-header">{{ count(notifications()) }} {{ trans('site.notifications') }}</span>
                <div class="dropdown-divider"></div>

                @if(count(notifications()) == 0)
                    <p class="text-danger mr-2">{{trans('site.not_exist_notification')}}</p>
                @endif

                @foreach(notifications() as $notification )
                    <a href="{{$notification->target_link}}" class="dropdown-item notification_link"
                       data-notid="{{$notification->uuid}}">
                        <i class="fas fa-bell mr-2"></i> {{Str::limit($currentLanguage == 'ar' ? $notification->name_ar : $notification->name_en, 20)}}
                        <span
                            class="float-right text-muted text-sm"> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($notification->created_at))->diffForHumans() }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
                <a href="{{ route('list_all_notifications') }}" class="dropdown-item dropdown-footer">
                    {{ trans('site.se_all_notifications') }}
                </a>
            </div>
        </li>

        {{--        @endif--}}

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#"> <span
                    class="text-white">{{ Auth::user() ? Auth::user()->username : '' }} </span>
                <img class="profile-photo-nav" src="{{ asset('user_image/'.$profileImage) }}"
                     alt="user profile">
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <img class="profile-photo-dropdown" src="{{ asset('user_image/'.$profileImage) }}"
                     alt="user profile">
                <p class="profile-name-dropdown"> {{ Auth::user() ? Auth::user()->username : '' }} </p>
                <a class="dropdown-item text-center" href="{{route('user_profile')}}">
                    <i class="fas fa-key ml-2"></i> <span
                        class=" float-right0 text-muted text-sm"> @lang('site.profile')</span>
                </a>
                <div class="dropdown-divider"></div>

                {{-- <p class="m-2 text-center"><a href="{{ route('users.show_reset_password') }}"> <i
                            class="fas fa-key"></i> @lang('site.reset_password')</a></p> --}}
                {{-- <div class="dropdown-divider"></div>
                  <p class="m-2 text-center"><a href="{{ route('users.show_reset_password', Auth::user()->id) }}"> <i class="fas fa-image"></i> @lang('site.edit_user_profile')</a></p> --}}

                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    <i class="user-nav-icon float-right0 fas fa-sign-out-alt mr-2"></i> <span
                        class=" float-right0 text-muted text-sm">@lang('site.Logout')</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div class="dropdown-divider"></div>
            </div>

        </li>

        <!--language -->
        <li class="nav-item dropdown">
            @if (LaravelLocalization::getCurrentLocale() == 'en')
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
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}"
                       class="dropdown-item language-flag-container">
                        <span class=" text-muted text-sm d-block">{{ $properties['native'] }}</span>

                        <img class="language-flag d-block"
                             src="{{ asset('dist/img/flag_img/' . $localeCode . '.png') }}"/>

                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
            </div>
        </li>

        {{--        --}}{{-- <li class="nav-item dropdown">--}}
        {{--            <a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--                <img class="profile-photo-nav" src="{{ asset('Images/user_profile.png') }}">--}}
        {{--            </a>--}}
        {{--            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--                <img class="profile-photo-dropdown" src="{{ asset('Images/user_profile.png') }}">--}}
        {{--                <p class="profile-name-dropdown"> {{ Auth::user()->name }} </p>--}}
        {{--                <div class="dropdown-divider"></div>--}}


        {{--                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();--}}
        {{--                    document.getElementById('logout-form').submit();">--}}
        {{--                    <i class="user-nav-icon float-right fas fa-sign-out-alt mr-2"></i> <span--}}
        {{--                        class=" float-right text-muted text-sm"> تسجيل خروج</span>--}}
        {{--                </a>--}}

        {{--                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
        {{--                    @csrf--}}
        {{--                </form>--}}
        {{--                <div class="dropdown-divider"></div>--}}
        {{--            </div>--}}

        {{--        </li> --}}
    </ul>
</nav>


