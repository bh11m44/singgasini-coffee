<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos = "fade-down">
      <div class="container">
        <a href="{{ route('home') }}" class="navbar-bread">
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
            <li class="nav-item active">
              <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('all-products') }}" class="nav-link">Shop</a>
            </li>
          </ul>
        </div>
      </div>
</nav>