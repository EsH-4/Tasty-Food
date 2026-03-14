@extends('layouts.app')

@section('title', 'Home')

{{-- Tambahkan class 'home-page' ke tag body untuk styling navbar yang berbeda (transparan) --}}
@section('body_class', 'home-page')

@section('content')
{{-- Navbar KHUSUS untuk halaman Home (transparan) --}}
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top home-navbar">
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
        </div>
        {{-- Bagian ikon keranjang/profil tidak ada di halaman Home --}}
    </div>
</nav>


{{-- KODE YANG ANDA BERIKAN DIMULAI DI SINI --}}

<section class="hero-section">
    <div class="hero-custom-wrapper">
        <div class="d-flex align-items-center">
            <div class="hero-content">
                <div class="hero-title-line"></div>
                <h1 class="hero-title">
                    HEALTHY <br><strong>TASTY FOOD</strong>
                </h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
                </p>
                <a href="{{ url('/tentang') }}" class="btn custom-btn">TENTANG KAMI</a> {{-- Mengubah href ke halaman Tentang --}}
            </div>
        </div>
        <img src="{{ asset('images/img-4-2000x2000.png') }}" alt="Healthy Tasty Food"
            class="img-fluid hero-img-right">
    </div>
</section>

{{-- SECTION BARU UNTUK TENTANG KAMI (TEKS DENGAN BACKGROUND PUTIH) --}}
<section class="about-text-section bg-white py-5 mb-5 mt-5">
    <div class="container text-center">
        <h2 class="text-uppercase fw-bold text-dark mb-4">TENTANG KAMI</h2>
        <p class="intro-paragraph mx-auto text-secondary" style="max-width: 700px;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.
        </p>
        <hr class="section-divider-dark mx-auto my-4">
    </div>
</section>

<section class="food-cards-background-section" style="background-image: url('{{ asset('images/Group 70.png') }}'); background-size: cover; background-position: center;">
    <div class="food-cards-overlay"></div> {{-- Tambahkan overlay --}}
    <div class="container">
        <div class="row justify-content-center g-4">

            <div class="col-md-3 col-sm-6 d-flex"> {{-- Tambahkan d-flex untuk align card --}}
                <div class="food-card text-center rounded shadow flex-fill" style="padding-top: 100px;"> {{-- flex-fill dan padding-top --}}
                    <div class="food-img-wrapper" style="width: 140px; height: 140px; top: -70px;"> {{-- Style inline untuk posisi piring --}}
                        <img src="{{ asset('images/img-1.png') }}" alt="Food Image 1" class="food-img">
                    </div>
                    <div class="food-card-content">
                        <h5 class="fw-bold">LOREM IPSUM</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 d-flex">
                <div class="food-card text-center rounded shadow flex-fill" style="padding-top: 100px;">
                    <div class="food-img-wrapper" style="width: 140px; height: 140px; top: -70px;">
                        <img src="{{ asset('images/img-2.png') }}" alt="Food Image 2" class="food-img">
                    </div>
                    <div class="food-card-content">
                        <h5 class="fw-bold">LOREM IPSUM</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 d-flex">
                <div class="food-card text-center rounded shadow flex-fill" style="padding-top: 100px;">
                    <div class="food-img-wrapper" style="width: 140px; height: 140px; top: -70px;">
                        <img src="{{ asset('images/img-3.png') }}" alt="Food Image 3" class="food-img">
                    </div>
                    <div class="food-card-content">
                        <h5 class="fw-bold">LOREM IPSUM</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 d-flex">
                <div class="food-card text-center rounded shadow flex-fill" style="padding-top: 100px;">
                    <div class="food-img-wrapper" style="width: 140px; height: 140px; top: -70px;">
                        <img src="{{ asset('images/img-4.png') }}" alt="Food Image 4" class="food-img">
                    </div>
                    <div class="food-card-content">
                        <h5 class="fw-bold">LOREM IPSUM</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="news-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">BERITA KAMI</h2>
        <div class="row g-4">
            <div class="col-md-6">
                @if($beritas->count() > 0)
                <div class="news-card large-card">
                    <img src="{{ asset('storage/' . $beritas->first()->gambar) }}" alt="{{ $beritas->first()->judul }}" class="img-fluid">
                    <div class="p-4">
                        <h3 class="fw-bold mb-3">{{ $beritas->first()->judul }}</h3>
                        <p class="mb-3">{{ Str::limit($beritas->first()->konten, 150) }}</p>
                        <a href="{{ url('/berita') }}" class="text-decoration-none fw-bold text-primary">Baca selengkapnya <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="row g-4">
                    @foreach($beritas->skip(1)->take(4) as $berita)
                    <div class="col-6">
                        <div class="news-card small-card">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid">
                            <div class="p-3">
                                <h5 class="fw-bold mb-2">{{ Str::limit($berita->judul, 30) }}</h5>
                                <p class="mb-2 small-text">{{ Str::limit($berita->konten, 50) }}</p>
                                <a href="{{ url('/berita') }}" class="text-decoration-none fw-bold text-primary">Baca selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="gallery-section py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">GALERI KAMI</h2>
        <!-- <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($galeris as $galeri)
            <div class="col">
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid rounded" alt="{{ $galeri->judul }}">
                </div>
            </div>
            @endforeach
        </div> -->
        <div class="row">
            @foreach($galeris as $galeri)
            <div class="col-4">
                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid rounded mb-4" alt="{{ $galeri->judul }}" style="width: 416px; height: 277px; object-fit:cover;">
            </div>
            @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ url('/galeri') }}" class="btn btn-dark btn-lg gallery-btn">LIHAT LEBIH BANYAK</a>
        </div>
    </div>
</section>



@endsection