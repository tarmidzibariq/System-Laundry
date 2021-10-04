<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li> --}}
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (Auth::user()->foto == null)
                    <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" alt=""
                        class="rounded-circle profile-widget-picture">
                @else
                    <img alt="image" src="{{ asset('/img' . '/' . Auth::user()->foto) }}" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block" style="text-transform: capitalize">Hi,
                    {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Masuk <span id="time">5 min ago</span></div>
                <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
@push('script')
    <script>
        setInterval(() => {
            document.getElementById("time").innerHTML = "{!! Carbon\Carbon::parse(session()->get('last_login_at'))->diffForHumans() !!}"
        }, 1000)
    </script>
@endpush
