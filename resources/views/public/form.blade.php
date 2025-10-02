<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pengaduan - SMPN 1 Situbondo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- HEADER SEKOLAH -->
    <header class="bg-white shadow mb-6">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between py-4 px-6">
            <!-- Logo + Nama Sekolah -->
            <a href="https://smpn1situbondo.sch.id/" target="_blank" class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="w-16 h-16">
                <div>
                    <h1 class="text-xl md:text-2xl font-bold hover:text-blue-600">
                        SMP NEGERI 1 SITUBONDO
                    </h1>
                    <p class="text-sm text-gray-600">Jl. PB Sudirman No.5 Situbondo, Patokan</p>
                </div>
            </a>
            <!-- Kontak -->
            <div class="flex flex-col md:flex-row items-center md:space-x-8 mt-4 md:mt-0">
                <div class="flex items-center space-x-2">
                    <span class="text-orange-500">✉️</span>
                    <div>
                        <p class="text-xs font-semibold text-gray-800">EMAIL:</p>
                        <p class="text-sm text-gray-600">info@smpn1situbondo.sch.id</p>
                    </div>
                </div>
                <div class="flex items-center space-x-2 mt-2 md:mt-0">
                    <span class="text-orange-500">📞</span>
                    <div>
                        <p class="text-xs font-semibold text-gray-800">TELEPON:</p>
                        <p class="text-sm text-gray-600">(0338) 671550</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- FORM PENGADUAN -->
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Form Pengaduan - SMPN 1 Situbondo</h1>
        @if(session('success'))
            <div class="bg-green-100 p-3 mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('public.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <label class="block mb-2">Nama
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">No. HP
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">Email
                <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">Pesan
                <textarea name="message" class="w-full p-2 border" required>{{ old('message') }}</textarea>
            </label>
            <label class="block mb-4">Lampiran (opsional)
                <input type="file" name="attachment">
            </label>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Kirim</button>
        </form>
    </div>
</body>
</html>
