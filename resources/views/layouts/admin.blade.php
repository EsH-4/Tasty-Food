<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Tasty Food Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        /* Custom scrollbar untuk sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Active menu highlight */
        .menu-active {
            background-color: #6366f1;
            color: white;
        }

        .menu-active i {
            color: white;
        }

        /* Hover effects */
        .menu-item:hover {
            background-color: #e0e7ff;
            color: #6366f1;
        }

        .menu-item:hover i {
            color: #6366f1;
        }

        /* Submenu animation */
        .submenu-enter {
            opacity: 0;
            transform: translateY(-10px);
        }

        .submenu-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        /* Mobile sidebar styles */
        .mobile-sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .mobile-sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Touch-friendly button sizes */
        .touch-button {
            min-height: 44px;
            min-width: 44px;
        }

        /* Responsive table styles */
        .responsive-table {
            overflow-x: auto;
        }

        /* Mobile-first responsive design */
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                height: 100vh;
                z-index: 1000;
                transition: left 0.3s ease;
                overflow-y: auto;
            }

            .sidebar.open {
                left: 0;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
            }

            .mobile-sidebar-overlay {
                display: block;
            }

            .mobile-sidebar-overlay.active+.sidebar {
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
                max-width: 85vw;
            }

            .main-content {
                width: 100%;
            }

            .responsive-table {
                font-size: 0.875rem;
            }

            .touch-button {
                padding: 12px 16px;
                min-height: 48px;
            }

            /* Mobile navigation improvements */
            .nav-item {
                padding: 12px 16px;
            }

            .nav-item i {
                font-size: 1.25rem;
            }

            .nav-item span {
                font-size: 1rem;
            }

            /* Mobile submenu improvements */
            .submenu {
                padding-left: 20px;
            }

            .submenu li {
                padding: 8px 0;
            }

            .submenu a {
                padding: 10px 12px;
                font-size: 0.9rem;
            }

            /* Mobile header improvements */
            .header-content {
                padding: 12px 16px;
            }

            .header-title {
                font-size: 1.25rem;
            }

            /* Mobile main content */
            .main-content {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                width: 260px;
            }

            .header-content {
                padding: 8px 12px;
            }

            .header-title {
                font-size: 1.1rem;
            }

            .main-content {
                padding: 12px;
            }

            .nav-item {
                padding: 10px 12px;
            }

            .nav-item span {
                font-size: 0.95rem;
            }
        }

        /* Modal styles - improved for mobile */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            padding: 16px;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            padding: 0;
            max-width: 400px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-header {
            padding: 20px 24px 0 24px;
            border-bottom: none;
            text-align: center;
        }

        .modal-body {
            padding: 16px 24px;
            text-align: center;
        }

        .modal-footer {
            padding: 16px 24px 20px 24px;
            border-top: none;
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .modal-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        }

        .modal-icon.warning {
            background-color: #fef3c7;
            color: #f59e0b;
        }

        .modal-icon.warning i {
            font-size: 28px;
        }

        .btn-modal {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            min-height: 44px;
            flex: 1;
            min-width: 120px;
        }

        .btn-modal-primary {
            background-color: #6366f1;
            color: white;
        }

        .btn-modal-primary:hover {
            background-color: #5855eb;
        }

        .btn-modal-secondary {
            background-color: #f1f5f9;
            color: #64748b;
        }

        .btn-modal-secondary:hover {
            background-color: #e2e8f0;
        }

        /* Mobile-specific modal adjustments */
        @media (max-width: 480px) {
            .modal-content {
                margin: 16px;
                max-height: calc(100vh - 32px);
            }

            .modal-header {
                padding: 16px 20px 0 20px;
            }

            .modal-body {
                padding: 12px 20px;
            }

            .modal-footer {
                padding: 12px 20px 16px 20px;
                flex-direction: column;
            }

            .btn-modal {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 bg-white shadow-lg flex flex-col">
            <!-- Logo/Brand -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <i class="ph ph-gauge text-indigo-600 text-3xl"></i>
                    <h1 class="text-xl font-bold text-indigo-600">Admin Panel</h1>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 p-4 sidebar-scroll">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'menu-active' : 'text-gray-700' }}">
                            <i class="ph ph-house text-xl {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-500' }}"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>

                    <!-- Berita Menu -->
                    <li class="relative">
                        <button onclick="toggleSubmenu('berita-submenu')"
                            class="menu-item w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.berita.*') ? 'menu-active' : 'text-gray-700' }}">
                            <div class="flex items-center gap-3">
                                <i class="ph ph-newspaper text-xl {{ request()->routeIs('admin.berita.*') ? 'text-white' : 'text-gray-500' }}"></i>
                                <span class="font-medium">Berita</span>
                            </div>
                            <i class="ph ph-caret-down transition-transform duration-200 {{ request()->routeIs('admin.berita.*') ? 'rotate-180 text-white' : 'text-gray-500' }}"></i>
                        </button>
                        <ul id="berita-submenu" class="ml-8 mt-2 space-y-1 {{ request()->routeIs('admin.berita.*') ? 'block' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.berita.index') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.berita.index') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-list text-sm"></i>
                                    <span>Daftar Berita</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.berita.create') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.berita.create') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-plus text-sm"></i>
                                    <span>Tambah Berita</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Galeri Menu -->
                    <li class="relative">
                        <button onclick="toggleSubmenu('galeri-submenu')"
                            class="menu-item w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.galeri.*') ? 'menu-active' : 'text-gray-700' }}">
                            <div class="flex items-center gap-3">
                                <i class="ph ph-image-square text-xl {{ request()->routeIs('admin.galeri.*') ? 'text-white' : 'text-gray-500' }}"></i>
                                <span class="font-medium">Galeri</span>
                            </div>
                            <i class="ph ph-caret-down transition-transform duration-200 {{ request()->routeIs('admin.galeri.*') ? 'rotate-180 text-white' : 'text-gray-500' }}"></i>
                        </button>
                        <ul id="galeri-submenu" class="ml-8 mt-2 space-y-1 {{ request()->routeIs('admin.galeri.*') ? 'block' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.galeri.index') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.galeri.index') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-list text-sm"></i>
                                    <span>Daftar Galeri</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.galeri.create') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.galeri.create') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-plus text-sm"></i>
                                    <span>Tambah Galeri</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Contact Menu -->
                    <li class="relative">
                        <button onclick="toggleSubmenu('contact-submenu')"
                            class="menu-item w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.contact.*') || request()->routeIs('admin.contact-messages.*') ? 'menu-active' : 'text-gray-700' }}">
                            <div class="flex items-center gap-3">
                                <i class="ph ph-phone text-xl {{ request()->routeIs('admin.contact.*') || request()->routeIs('admin.contact-messages.*') ? 'text-white' : 'text-gray-500' }}"></i>
                                <span class="font-medium">Kontak</span>
                            </div>
                            <i class="ph ph-caret-down transition-transform duration-200 {{ request()->routeIs('admin.contact.*') || request()->routeIs('admin.contact-messages.*') ? 'rotate-180 text-white' : 'text-gray-500' }}"></i>
                        </button>
                        <ul id="contact-submenu" class="ml-8 mt-2 space-y-1 {{ request()->routeIs('admin.contact.*') || request()->routeIs('admin.contact-messages.*') ? 'block' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.contact.index') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.contact.index') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-list text-sm"></i>
                                    <span>Daftar Kontak</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.contact-messages.index') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.contact-messages.*') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-envelope text-sm"></i>
                                    <span>Kontak Masuk</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Sampah Berita Menu -->
                    <li class="relative">
                        <button onclick="toggleSubmenu('trash-berita-submenu')"
                            class="menu-item w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.trash.berita*') ? 'menu-active' : 'text-gray-700' }}">
                            <div class="flex items-center gap-3">
                                <i class="ph ph-newspaper text-xl {{ request()->routeIs('admin.trash.berita*') ? 'text-white' : 'text-gray-500' }}"></i>
                                <span class="font-medium">Sampah Berita</span>
                            </div>
                            <i class="ph ph-caret-down transition-transform duration-200 {{ request()->routeIs('admin.trash.berita*') ? 'rotate-180 text-white' : 'text-gray-500' }}"></i>
                        </button>
                        <ul id="trash-berita-submenu" class="ml-8 mt-2 space-y-1 {{ request()->routeIs('admin.trash.berita*') ? 'block' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.trash.berita') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.trash.berita') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-list text-sm"></i>
                                    <span>Lihat Berita Dihapus</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Sampah Galeri Menu -->
                    <li class="relative">
                        <button onclick="toggleSubmenu('trash-galeri-submenu')"
                            class="menu-item w-full flex items-center justify-between px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.trash.galeri*') ? 'menu-active' : 'text-gray-700' }}">
                            <div class="flex items-center gap-3">
                                <i class="ph ph-image-square text-xl {{ request()->routeIs('admin.trash.galeri*') ? 'text-white' : 'text-gray-500' }}"></i>
                                <span class="font-medium">Sampah Galeri</span>
                            </div>
                            <i class="ph ph-caret-down transition-transform duration-200 {{ request()->routeIs('admin.trash.galeri*') ? 'rotate-180 text-white' : 'text-gray-500' }}"></i>
                        </button>
                        <ul id="trash-galeri-submenu" class="ml-8 mt-2 space-y-1 {{ request()->routeIs('admin.trash.galeri*') ? 'block' : 'hidden' }}">
                            <li>
                                <a href="{{ route('admin.trash.galeri') }}"
                                    class="flex items-center gap-3 px-3 py-2 text-sm rounded {{ request()->routeIs('admin.trash.galeri') ? 'text-indigo-600 font-medium' : 'text-gray-600 hover:text-indigo-600' }}">
                                    <i class="ph ph-list text-sm"></i>
                                    <span>Lihat Galeri Dihapus</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <!-- User Info & Logout -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="ph ph-user text-indigo-600 text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Admin</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                    </div>
                    <button onclick="showLogoutModal()"
                        class="text-red-500 hover:text-red-600 p-2 rounded-lg hover:bg-red-50 transition-colors"
                        title="Logout">
                        <i class="ph ph-sign-out text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm p-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <button onclick="toggleSidebar()"
                            class="lg:hidden p-2 rounded-lg hover:bg-gray-100 text-gray-600 touch-button">
                            <i class="ph ph-list text-xl"></i>
                        </button>
                        <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600 touch-button">
                            <i class="ph ph-bell text-xl"></i>
                        </button>
                        <button class="p-2 rounded-lg hover:bg-gray-100 text-gray-600 touch-button">
                            <i class="ph ph-gear text-xl"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Session Messages -->
                @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <div class="flex items-center">
                        <i class="ph ph-check-circle mr-2"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <div class="flex items-center">
                        <i class="ph ph-x-circle mr-2"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i class="ph ph-warning-circle mr-2"></i>
                        <span class="font-semibold">Terjadi kesalahan:</span>
                    </div>
                    <ul class="list-disc list-inside ml-4">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobile-sidebar-overlay" class="mobile-sidebar-overlay"></div>

    <!-- Logout Modal -->
    <div id="logout-modal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon warning">
                    <i class="ph ph-warning"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Konfirmasi Logout</h3>
            </div>
            <div class="modal-body">
                <p class="text-gray-600">Apakah Anda yakin ingin keluar dari akun ini?</p>
            </div>
            <div class="modal-footer">
                <button onclick="hideLogoutModal()" class="btn-modal btn-modal-secondary">Batal</button>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-modal btn-modal-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Restore Modal -->
    <div id="restore-modal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon warning">
                    <i class="ph ph-warning"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Konfirmasi Pemulihan</h3>
            </div>
            <div class="modal-body">
                <p class="text-gray-600">Apakah Anda yakin ingin memulihkan item ini?</p>
            </div>
            <div class="modal-footer">
                <button onclick="hideRestoreModal()" class="btn-modal btn-modal-secondary">Batal</button>
                <button onclick="confirmRestore()" class="btn-modal btn-modal-primary">Pulihkan</button>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="delete-modal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-icon warning">
                    <i class="ph ph-warning"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800">Konfirmasi Hapus Permanen</h3>
            </div>
            <div class="modal-body">
                <p class="text-gray-600">Apakah Anda yakin ingin menghapus item ini secara permanen? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button onclick="hideDeleteModal()" class="btn-modal btn-modal-secondary">Batal</button>
                <button onclick="confirmDelete()" class="btn-modal btn-modal-primary">Hapus Permanen</button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Sidebar toggle
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.getElementById('mobile-sidebar-overlay').addEventListener('click', function() {
            toggleSidebar();
        });

        // Submenu toggle with animation
        function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            const allSubmenus = document.querySelectorAll('[id$="-submenu"]');

            // Close other submenus
            allSubmenus.forEach(menu => {
                if (menu.id !== id) {
                    menu.classList.add('hidden');
                }
            });

            if (submenu.classList.contains('hidden')) {
                submenu.classList.remove('hidden');
                submenu.classList.add('submenu-enter');
                setTimeout(() => {
                    submenu.classList.add('submenu-enter-active');
                    submenu.classList.remove('submenu-enter');
                }, 10);
            } else {
                submenu.classList.add('hidden');
            }
        }

        // Logout modal functions
        function showLogoutModal() {
            document.getElementById('logout-modal').classList.add('active');
        }

        function hideLogoutModal() {
            document.getElementById('logout-modal').classList.remove('active');
        }

        // Restore modal functions
        let restoreForm = null;

        function showRestoreModal(form) {
            restoreForm = form;
            document.getElementById('restore-modal').classList.add('active');
        }

        function hideRestoreModal() {
            document.getElementById('restore-modal').classList.remove('active');
            restoreForm = null;
        }

        function confirmRestore() {
            if (restoreForm) {
                restoreForm.submit();
            }
        }

        // Delete modal functions
        let deleteForm = null;

        function showDeleteModal(form) {
            deleteForm = form;
            document.getElementById('delete-modal').classList.add('active');
        }

        function hideDeleteModal() {
            document.getElementById('delete-modal').classList.remove('active');
            deleteForm = null;
        }

        function confirmDelete() {
            if (deleteForm) {
                deleteForm.submit();
            }
        }

        // Handle ESC key for modal and sidebar
        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                hideLogoutModal();
                const sidebar = document.querySelector('.sidebar');
                const overlay = document.getElementById('mobile-sidebar-overlay');
                if (sidebar.classList.contains('open')) {
                    toggleSidebar();
                }
            }
        });

        // Auto close sidebar on window resize (if switching from mobile to desktop)
        window.addEventListener('resize', function() {
            if (window.innerWidth > 1024) {
                const sidebar = document.querySelector('.sidebar');
                const overlay = document.getElementById('mobile-sidebar-overlay');
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }
        });

        // Auto expand active submenu on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Auto expand active submenu based on current route
            const currentPath = window.location.pathname;
            let activeSubmenu = '';

            if (currentPath.includes('/admin/berita')) {
                activeSubmenu = 'berita';
            } else if (currentPath.includes('/admin/galeri')) {
                activeSubmenu = 'galeri';
            } else if (currentPath.includes('/admin/contact')) {
                activeSubmenu = 'contact';
            } else if (currentPath.includes('/admin/trash/berita')) {
                activeSubmenu = 'trash-berita';
            } else if (currentPath.includes('/admin/trash/galeri')) {
                activeSubmenu = 'trash-galeri';
            }

            if (activeSubmenu) {
                const submenu = document.getElementById(activeSubmenu + '-submenu');
                if (submenu) {
                    submenu.classList.remove('hidden');
                }
            }
        });
    </script>
</body>

</html>