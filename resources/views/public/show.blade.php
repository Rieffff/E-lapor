<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Pengaduan</title>
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

    <!-- DETAIL PENGADUAN -->
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-xl font-bold mb-3">Detail Pengaduan</h1>

        <p><strong>Nama:</strong> {{ $complaint->name }}</p>
        <p><strong>Email:</strong> {{ $complaint->email }}</p>
        <p><strong>No HP:</strong> {{ $complaint->phone }}</p>
        <p><strong>Status:</strong> 
            <span class="px-2 py-1 rounded text-white 
                {{ $complaint->status=='baru' ? 'bg-red-500' : ($complaint->status=='diproses' ? 'bg-yellow-500' : 'bg-green-600') }}">
                {{ ucfirst($complaint->status) }}
            </span>
        </p>
        <p class="mt-4"><strong>Laporan:</strong><br>{{ $complaint->message }}</p>

        @if($complaint->attachment)
            <p class="mt-2">
                <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="text-blue-600 underline">
                    📎 Lihat Lampiran
                </a>
            </p>
        @endif

        <div class="mt-6">
            <h2 class="font-bold mb-2">💬 Respon Admin:</h2>
            @forelse($complaint->responses as $r)
                <div class="mb-3 p-3 border rounded bg-gray-50">
                    <p class="text-sm text-gray-600">{{ $r->user->name }} ({{ $r->created_at->format('d-m-Y H:i') }})</p>
                    <p>{{ $r->response }}</p>
                </div>
            @empty
                <p class="italic text-gray-500">Belum ada respon dari admin.</p>
            @endforelse
        </div>

        <a href="{{ route('public.list') }}" class="mt-4 inline-block px-3 py-2 bg-gray-600 text-white rounded">← Kembali</a>
    </div>
</body>
</html>
