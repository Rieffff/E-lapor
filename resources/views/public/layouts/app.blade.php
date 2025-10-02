<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>  
        @if (trim($__env->yieldContent('title')))
        @yield('title') | {{ config('app.name') }}
        @else
        {{ config('app.name') }}
        @endif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100">

    <!-- HEADER SEKOLAH -->
<header class="bg-white shadow mb-6">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between py-4 px-6">
        <!-- Logo + Nama Sekolah -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="w-12 h-12 md:w-16 md:h-16">
            <div>
                <h1 class="text-lg md:text-2xl font-bold leading-tight">
                    <a href="https://smpn1situbondo.sch.id/" target="_blank" class="hover:text-blue-600">
                        SMP NEGERI 1 SITUBONDO
                    </a>
                </h1>
                <p class="text-xs md:text-sm text-gray-600">Jl. PB Sudirman No.5 Situbondo, Patokan</p>
            </div>
        </div>

        <!-- Kontak (Desktop) -->
        <div class="hidden md:flex items-center space-x-8">
            <div class="flex items-center space-x-2">
                <span class="text-orange-500">✉️</span>
                <div>
                    <p class="text-xs font-semibold text-gray-800">EMAIL:</p>
                    <p class="text-sm text-gray-600">info@smpn1situbondo.sch.id</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-orange-500">📞</span>
                <div>
                    <p class="text-xs font-semibold text-gray-800">TELEPON:</p>
                    <p class="text-sm text-gray-600">(0338) 671550</p>
                </div>
            </div>
        </div>

        <!-- Hamburger Button (Mobile) -->
        <button id="menu-toggle" class="md:hidden ml-auto text-gray-700 focus:outline-none">
            ☰
        </button>
    </div>

    <!-- Kontak (Mobile Menu) -->
    <div id="mobile-menu" class="md:hidden hidden px-6 pb-4 space-y-3">
        <div class="flex items-center space-x-2">
            <span class="text-orange-500">✉️</span>
            <div>
                <p class="text-xs font-semibold text-gray-800">EMAIL:</p>
                <p class="text-sm text-gray-600">info@smpn1situbondo.sch.id</p>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <span class="text-orange-500">📞</span>
            <div>
                <p class="text-xs font-semibold text-gray-800">TELEPON:</p>
                <p class="text-sm text-gray-600">(0338) 671550</p>
            </div>
        </div>
    </div>
</header>

<!-- Script Toggle Menu -->
<script>
    document.getElementById("menu-toggle").addEventListener("click", function () {
        document.getElementById("mobile-menu").classList.toggle("hidden");
    });
</script>


    <!-- KONTEN UTAMA -->
    
        @yield('content')

    <script>
    $(document).ready(function() {
        $('#complaintsTable').DataTable();
    });
    </script>
</body>
</html>
