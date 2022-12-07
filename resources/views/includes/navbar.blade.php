<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos = "fade-down">
      <div class="container">
        <a href="{{ route ('home')}}" class="navbar-bread">
          <img src="/images/banner-sc2.jpg" alt="" class="rounded-circle mr-2 profile-picture">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" data-toggle="modal" data-target="#pembelianModal">
              <a href="#" class="nav-link">Panduan Pembelian</a>
            </li>
            <li class="nav-item">
              <a href="{{ route ('home')}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route ('all-products')}}" class="nav-link">Shop</a>
            </li>
            @guest
              <li class="nav-item">
                <a href="{{ route ('register')}}" class="nav-link">Sign Up</a>
              </li>
              <li class="nav-item">
                <a href="{{ route ('login')}}" class="btn btn-dark nav-link px-4 text-white">Sign In</a>
              </li>
            @endguest
          </ul>

          @auth
              <ul class="navbar-nav d-none d-lg-flex">
                    <li class="nav-item dropdown">
                      <a href="#" class="nav-link" id="navbar-dropdown" role="button" data-toggle="dropdown">
                        <img src="{{ Storage::url(Auth::user()->foto) }}" alt="" class="rounded-circle mr-2 profile-picture">
                        Hi, {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu">
                        @if(Auth::user()->jenis_pengguna == "PENJUAL")
                          <a href="{{ route('dashboard-penjual') }}" class="dropdown-item">Dashboard</a>
                        @elseif(Auth::user()->jenis_pengguna == "PEMBELI")
                          <a href="{{ route('dashboard-pembeli') }}" class="dropdown-item">Dashboard</a>
                        @elseif(Auth::user()->jenis_pengguna == "ADMIN")
                          <a href="{{ route('dashboard-penjual') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        
                        <div class="dropdown-divider"></div>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </li>
                    <li class="nav-item">
                      @if(Auth::user()->jenis_pengguna == "PEMBELI")
                          <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                          @php 
                            $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                          @endphp
                          @if($carts > 0)
                            <img src="/images/icon-cart-filled.svg" alt="">
                            <div class="card-badge">{{ $carts }}</div>
                          @else
                            <img src="/images/icon-cart-empty.svg" alt="">
                          @endif
                      </a>
                      @elseif(Auth::user()->jenis_pengguna == "ADMIN")

                      @endif
                    </li>
                </ul>
                <!--Mobile-->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item dropdown">
                      <a href="#" class="nav-link" id="navbar-dropdown" role="button" data-toggle="dropdown">
                        <img src="{{ Storage::url(Auth::user()->foto) }}" alt="" class="rounded-circle mr-2 profile-picture">
                        Hi, {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu">
                        @if(Auth::user()->jenis_pengguna == "PENJUAL")
                          <a href="{{ route('dashboard-penjual') }}" class="dropdown-item">Dashboard</a>
                        @elseif(Auth::user()->jenis_pengguna == "PEMBELI")
                          <a href="{{ route('dashboard-pembeli') }}" class="dropdown-item">Dashboard</a>
                        @elseif(Auth::user()->jenis_pengguna == "ADMIN")
                          <a href="{{ route('dashboard-penjual') }}" class="dropdown-item">Dashboard</a>
                        @endif
                        
                        <div class="dropdown-divider"></div>

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </li>
                  <li class="nav-item">
                      @if(Auth::user()->jenis_pengguna == "PEMBELI")
                          <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                          @php 
                            $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                          @endphp
                          @if($carts > 0)
                            <img src="/images/icon-cart-filled.svg" alt="">
                            <div class="card-badge">{{ $carts }}</div>
                          @else
                            <img src="/images/icon-cart-empty.svg" alt="">
                          @endif
                      </a>
                      @elseif(Auth::user()->jenis_pengguna == "ADMIN")

                      @endif
                    </li>
                </ul>
          @endauth
        </div>
      </div>
    </nav>