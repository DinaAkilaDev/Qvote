<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ url('/') }}">
                <img src="{{asset('assets/img/logo.png')}}" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>

        <div class="page-top">

            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif



                    @else
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            {{--                            <img alt="" class="img-circle" src="../assets/layouts/layout2/img/avatar3_small.jpg"/>--}}
                            <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                        </a>
                    </li>
                    <li class="dropdown dropdown-extended quick-sidebar-toggler" style="margin-top: -13px;">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <i class="icon-logout"></i>
                            </form>
                        </a>
                    </li>
                    @endguest

                </ul>
            </div>
        </div>
    </div>
</div>

