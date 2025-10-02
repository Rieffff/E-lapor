<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Detail Pengaduan</title>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen py-10 font-sans">

<div class="max-w-4xl mx-auto px-6 space-y-8">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-3 sm:mb-0">Detail Pengaduan #{{ $complaint->id }}</h1>
        <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg shadow font-medium transition">Kembali</a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-3 rounded-lg text-center font-medium transition">
            {{ session('success') }}
        </div>
    @endif

    <!-- Detail Pengaduan Card -->
    <div class="bg-white rounded-2xl shadow-md p-6 space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <p class="font-semibold text-gray-700 flex items-center"><i class="fas fa-user mr-2 text-gray-500"></i>Nama</p>
                <p class="text-gray-800">{{ $complaint->name }}</p>
            </div>
            <div>
                <p class="font-semibold text-gray-700 flex items-center"><i class="fas fa-phone mr-2 text-gray-500"></i>HP</p>
                <p class="text-gray-800">{{ $complaint->phone }}</p>
            </div>
            <div>
                <p class="font-semibold text-gray-700 flex items-center"><i class="fas fa-envelope mr-2 text-gray-500"></i>Email</p>
                <p class="text-gray-800">{{ $complaint->email }}</p>
            </div>
            <div>
                <p class="font-semibold text-gray-700 flex items-center"><i class="fas fa-comment mr-2 text-gray-500"></i>Pesan</p>
                <p class="text-gray-800">{{ $complaint->message }}</p>
            </div>
        </div>

        @if($complaint->attachment)
            @php
                $ext = strtolower(pathinfo($complaint->attachment, PATHINFO_EXTENSION));
                $imageExts = ['jpg','jpeg','png','gif','webp'];
            @endphp
            <div>
                <p class="font-semibold text-gray-700 mt-4">Lampiran:</p>
                @if(in_array($ext, $imageExts))
                    <img src="{{ asset('storage/' . $complaint->attachment) }}" alt="Lampiran" class="mt-2 rounded-xl border max-w-full h-auto shadow-sm">
                @else
                    <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="text-blue-600 hover:underline font-medium mt-2 inline-block">Lihat Dokumen</a>
                @endif
            </div>
        @endif

        <div>
            <p class="font-semibold text-gray-700 mt-4">Status:</p>
            <p class="mt-1">
                @if($complaint->status == 'baru')
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">Baru</span>
                @elseif($complaint->status == 'diproses')
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Diproses</span>
                @elseif($complaint->status == 'selesai')
                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Selesai</span>
                @endif
            </p>
        </div>

        <!-- Ubah Status -->
        <form action="{{ route('admin.complaints.status',$complaint->id) }}" method="POST" class="mt-4 flex flex-col sm:flex-row items-start sm:items-center space-y-3 sm:space-y-0 sm:space-x-4">
            @csrf
            <label class="flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-2 w-full sm:w-auto">
                <span class="font-semibold text-gray-700">Ubah Status:</span>
                <select name="status" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                    <option value="baru" {{ $complaint->status=='baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ $complaint->status=='diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $complaint->status=='selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </label>
            <button type="submit" class="px-5 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow transition">
                Simpan
            </button>
        </form>
    </div>

    <!-- Respons Card -->
    <div class="bg-white rounded-2xl shadow-md p-6 space-y-5">
        <h2 class="text-xl font-bold text-gray-800">Respons</h2>

        <div class="space-y-3">
            @foreach($complaint->responses as $r)
                <div class="border-l-4 border-blue-500 pl-4 py-3 bg-gray-50 rounded-lg shadow-sm transition hover:bg-gray-100">
                    <p class="text-gray-700 font-semibold flex items-center"><i class="fas fa-user mr-2 text-gray-500"></i>{{ $r->user->name }} — <span class="text-gray-500 text-sm ml-2">{{ $r->created_at->format('Y-m-d H:i') }}</span></p>
                    <p class="text-gray-700 mt-1">{{ $r->response }}</p>
                </div>
            @endforeach
        </div>

        <!-- Form Balas -->
        <form action="{{ route('admin.complaints.response',$complaint->id) }}" method="POST" class="space-y-3 mt-4">
            @csrf
            <label class="block text-gray-700 font-semibold flex items-center"><i class="fas fa-reply mr-2"></i>Balas:</label>
            <textarea name="response" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" required></textarea>
            <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow transition">
                Kirim Respons
            </button>
        </form>
    </div>

</div>

</body>
</html>
