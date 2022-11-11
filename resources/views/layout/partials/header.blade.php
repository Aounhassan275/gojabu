<nav class="navbar navbar-expand navbar-light bg-white">
<a class="sidebar-toggle d-flex mr-2">
    <i class="hamburger align-self-center"></i>
</a>


<div class="navbar-collapse collapse">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
            </a>

            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
            <img src="{{asset('assets/img/avatars/avatar.jpg')}}" class="avatar img-fluid rounded-circle mr-1" alt="{{Auth::user()->name}}"> <span class="text-dark">{{Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{route('logout')}}">Sign out</a>
            </div>
        </li>
    </ul>
</div>
</nav>