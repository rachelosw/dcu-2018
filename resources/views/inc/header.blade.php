@section('header')
<header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto">DCU 2018</a></h1> -->
        <a href="{{ route('index') }}"><img src="/images/logo.png" class="img-fluid"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{ route('index') }}">Home</a></li>
          <li class="menu-has-children"><a href="">About DCU</a>
            <ul>
              <li><a class="dropdown-item" href="{{ route('dcu-inspiration') }}">{{ __('DCU Inspiration')}}</a></li>
              <li><a class="dropdown-item" href="{{ route('dcu-opportunities') }}">{{ __('DCU Opportunities')}}</a></li>
              <li><a class="dropdown-item" href="{{ route('dcu-specials') }}">{{ __('DCU Specials')}}</a></li>
              <li><a class="dropdown-item" href="{{ route('dcu-care') }}">{{ __('DCU Care')}}</a></li>
              </ul>
              </li>
          
          @guest
          <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
          <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
          @else
          <li class="menu-has-children"><a href=""><i class="icon ion-ios-person"></i> {{ Auth::user()->name }}</a>
            <ul>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
              <li><a class="dropdown-item" href="{{ route('auth.dashboard') }}">{{ __('Dashboard')}}</a></li>
            </ul>
          </li>
          @endguest
        </ul>
      </nav>
    </div>
  </header>
  @show