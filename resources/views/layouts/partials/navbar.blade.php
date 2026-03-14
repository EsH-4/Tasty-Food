<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
  <div class="container d-flex align-items-center ps-0">
    <a class="navbar-brand fw-bold fs-2 me-4" href="{{ url('/') }}">TASTY FOOD</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex flex-row align-items-center gap-5 ms-0">
        <li class="nav-item">
          <a class="nav-link fs-5 {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 {{ Request::is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">TENTANG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 {{ Request::is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">BERITA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 {{ Request::is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">GALERI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">KONTAK</a>
        </li>
      </ul>
      <!-- <ul class="navbar-nav ms-auto d-flex flex-row align-items-center gap-3">
        <li class="nav-item">
          <a href="#" class="nav-link position-relative">
            <img src="{{ asset('images/ic_shopping_cart_24px.png') }}" alt="Cart" style="width:24px; height:24px;">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/ic_account_circle_24px.png') }}" alt="User" style="width:24px; height:24px; border-radius:50%;">
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Profil Saya</a></li>
            <li><a class="dropdown-item" href="#">Logout</a></li>
          </ul> -->
        </li>
      </ul>
    </div>
  </div>
</nav>
