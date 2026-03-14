<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Kami</title>

    {{-- Link ke CSS Bootstrap dan ikon Bootstrap secara manual --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Link ke app.css Anda. Pastikan ini adalah jalur yang benar --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Style CSS kustom inline untuk halaman ini --}}
    <style>
        /* Umum untuk bagian header, pastikan padding-top cukup untuk navbar fixed */
        .page-header {
            padding-top: 100px;
            /* Sesuaikan dengan tinggi navbar Anda */
            min-height: 500px;
            /* Tinggi minimum header */
            position: relative;
            background-size: cover;
            background-position: center;
            overflow: hidden;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            text-align: left;
            color: white;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .page-header .container {
            position: relative;
            z-index: 2;
            width: auto;
            max-width: 600px;
            text-align: left;
            margin-left: 8%;
            /* Contoh nilai, coba sesuaikan ini (misal 5%, 10% dll) */
            padding-left: 0 !important;
            /* Pastikan padding container tidak mengganggu */
        }

        /* Styling untuk navbar agar sesuai gambar */
        .navbar-custom {
            background-color: transparent !important;
            transition: background-color 0.3s ease-in-out;
            padding-top: 20px;
            padding-bottom: 20px;
            z-index: 1030;
        }

        /* Kelas yang akan ditambahkan/dihapus oleh JavaScript saat discroll */
        .navbar-scrolled {
            background-color: rgba(0, 0, 0, 0.8) !important;
            /* Contoh warna background saat discroll */
        }

        .navbar-custom .container-fluid {
            padding-left: 2%;
            padding-right: 2%;
        }

        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 2rem;
            margin-left: 30px;
            /* Pertahankan untuk desktop alignment */
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: bold;
            font-size: 1rem;
            margin-left: 25px;
            /* Margin antar link pada desktop */
            text-transform: uppercase;
        }

        .navbar-custom .nav-link.active,
        .navbar-custom .nav-link:hover {
            color: #ffc107 !important;
        }

        /* MEDIA QUERIES untuk responsivitas navbar */
        @media (max-width: 991.98px) {

            /* Untuk ukuran layar di bawah large (lg) breakpoint Bootstrap */
            .navbar-custom .navbar-brand {
                margin-left: 15px;
                /* Sesuaikan margin brand untuk mobile */
            }

            .navbar-custom .navbar-nav {
                margin-right: 0;
                /* Hapus margin kanan pada mobile */
                text-align: left;
                /* Rata kiri item menu pada mobile */
                width: 100%;
                /* Pastikan menu mengambil lebar penuh */
            }

            .navbar-custom .nav-link {
                margin-left: 0;
                /* Hapus margin kiri pada mobile */
                padding-left: 15px;
                /* Tambahkan padding agar tidak terlalu mepet kiri */
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: white;
                /* Ganti jadi putih */
                color: black !important;
                /* Ganti warna teks jadi hitam */
                border-bottom: 1px solid #eee;
                /* Garis pemisah antar link */
            }

            .navbar-custom .navbar-nav .nav-item:first-child .nav-link {
                border-top: 1px solid #eee;
                /* Garis atas untuk item pertama */
            }

            .navbar-custom .nav-link.active,
            .navbar-custom .nav-link:hover {
                color: #007bff !important;
                /* Warna hover bisa disesuaikan */
            }

            .navbar-custom .navbar-collapse {
                flex-direction: column;
                /* Susun item secara vertikal */
                align-items: flex-start;
                /* Rata kiri item menu */
                background-color: white;
                /* Ganti jadi putih */
                position: absolute;
                /* Penting agar menu turun di bawah navbar */
                top: 100%;
                /* Agar mulai di bawah navbar */
                left: 0;
                width: 100%;
                z-index: 1029;
                /* Di bawah navbar tapi di atas konten */
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
                /* Tambah sedikit shadow */
            }

            .navbar-custom .navbar-toggler {
                margin-right: 15px;
                /* Beri sedikit margin pada toggler di mobile */
            }

            .navbar-custom .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.7)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
                /* Ganti warna ikon toggler jadi hitam */
                filter: none;
                /* Hapus filter invert */
            }
        }

        @media (min-width: 992px) {

            /* Untuk ukuran layar di atas atau sama dengan large (lg) breakpoint Bootstrap */
            .navbar-custom .navbar-collapse {
                display: flex !important;
                justify-content: space-between;
                width: 100%;
            }

            .navbar-custom .navbar-nav {
                margin-right: 30px;
            }
        }

        /* Padding antar section konten */
        section {
            padding: 80px 0;
        }

        /* Styling untuk Galeri */
        .gallery-section {
            background-color: #f8f9fa;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover img {
            opacity: 0.8;
        }

        .gallery-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .overlay {
            opacity: 1;
        }

        .gallery-item .overlay h5 {
            color: white;
            font-weight: bold;
        }

        /* Styling untuk footer baru yang Anda berikan */
        .footer {
            background-color: #000;
            color: #fff;
            padding: 60px 0;
        }

        .footer h5 {
            color: #fff;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .footer p {
            color: #ccc;
            line-height: 1.8;
            font-size: 0.9rem;
        }

        .footer .social-icons a img {
            width: 30px;
            height: 30px;
        }

        .footer ul {
            padding-left: 0;
            list-style: none;
        }

        .footer ul li a {
            color: #ccc;
            text-decoration: none;
            line-height: 2.2;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer ul li a:hover {
            color: #ffc107;
        }

        .footer .contact-info p {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .footer .contact-info p img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            filter: brightness(0) invert(1);
        }

        .footer .copyright {
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.85rem;
            color: #888;
        }

        /* Custom Pagination Styling */
        .pagination {
            margin: 0;
        }

        .pagination .page-link {
            color: #333;
            background-color: #fff;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .pagination .page-item.active .page-link {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
</head>

<body>

    {{-- Navbar Manual (Inline) --}}
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container-fluid">
            {{-- Brand dan Toggler dipindahkan ke sini agar selalu terlihat di satu baris pada mobile --}}
            <a class="navbar-brand" href="{{ url('/') }}">TASTY FOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="{{ url('/tentang') }}">TENTANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('berita') ? 'active' : '' }}" href="{{ url('/berita') }}">BERITA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('galeri') ? 'active' : '' }}" href="{{ url('/galeri') }}">GALERI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('/kontak') }}">KONTAK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        {{-- Hero Section --}}
        <section class="hero-section page-header" style="background-image: url('{{ asset('images/img-4-2000x2000.png') }}');">
            <div class="container">
                <h1 class="fw-bold mb-3" style="font-size: 3.5rem;">GALERI KAMI</h1>
            </div>
        </section>

        {{-- SECTION: Galeri --}}
        <section class="gallery-section py-5">
            <div class="container">
                <div class="mb-5">
                    <h3 class="text-center mb-4">Carousel Galeri</h3>
                    <div id="galleryCarousel" class="carousel slide rounded-4 shadow" data-bs-ride="carousel" style="overflow: hidden;">
                        <div class="carousel-inner rounded-4">
                            @foreach($galeris as $index => $galeri)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $galeri->gambar) }}" class="d-block w-100" alt="{{ $galeri->judul }}" style="height: 350px; object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-2">
                                    <h5>{{ $galeri->judul }}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                    @foreach($galeris as $galeri)
                    <div class="col">
                        <div class="gallery-item rounded-4 shadow-sm overflow-hidden">
                            <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid rounded-4" alt="{{ $galeri->judul }}">
                            <div class="overlay">
                                <h5>{{ $galeri->judul }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $galeris->links() }}
                </div>

            </div>
        </section>

    </main>

    {{-- Footer --}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <h5 class="mb-4">Tasty Food</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi commodo odio ac mi sollicitudin, sit amet egestas nulla hendrerit. Etiam luctus, nullam dignissim.</p>
                    <div class="social-icons">
                        <a href="#" class="me-2"><img src="{{ asset('images/001-facebook@2x.png') }}" alt="Facebook"></a>
                        <a href="#"><img src="{{ asset('images/002-twitter@2x.png') }}" alt="Twitter"></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h5 class="mb-4">Useful links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Testimonial</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="mb-4">Privacy</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Service</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Contact Info</h5>
                    <div class="contact-info">
                        <p><img src="{{ asset('images/ic_mail_24px@2x.png') }}" alt="Email Icon"> tastyfood@gmail.com</p>
                        <p><img src="{{ asset('images/ic_call_24px@2x.png') }}" alt="Phone Icon"> +62 822 5434 7654</p>
                        <p><img src="{{ asset('images/ic_place_24px@2x.png') }}" alt="Location Icon"> 4000 Bandung, Jawa Barat</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 text-center copyright">
                    <p class="mb-0">Copyright 2025 All Right Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- Script Bootstrap dan aplikasi Anda secara manual --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Script untuk mengubah warna navbar saat discroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar-custom');
            const navbarCollapse = document.getElementById('navbarNav');

            function toggleNavbarBackground() {
                if (window.innerWidth >= 992) {
                    if (window.scrollY > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            }

            window.addEventListener('scroll', toggleNavbarBackground);
            toggleNavbarBackground();
            window.addEventListener('resize', toggleNavbarBackground);

            navbarCollapse.addEventListener('show.bs.collapse', function() {
                navbar.classList.remove('navbar-scrolled');
            });

            navbarCollapse.addEventListener('hide.bs.collapse', function() {
                toggleNavbarBackground();
            });
        });
    </script>
</body>

</html>