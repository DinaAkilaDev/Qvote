<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item @if(preg_match('/home/i',url()->current())) start active open @endif">
                <a href="{{url('/home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Home</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>
            <li class="nav-item  @if(preg_match('/votes/i',url()->current())) start active open @endif">
                <a href="{{url('/votes')}}" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Vote</span>
                    <span class="arrow"></span>
                </a>

            </li>

        </ul>
    </div>
</div>
