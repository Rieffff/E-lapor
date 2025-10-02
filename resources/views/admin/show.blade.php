<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Detail Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-4xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Detail Pengaduan #{{ $complaint->id }}</h1>
        <a href="{{ route('admin.dashboard') }}" class="px-3 py-1 bg-gray-200 rounded">Kembali</a>
    </div>
    @if(session('success'))<div class="bg-green-100 p-3 mb-4">{{ session('success') }}</div>@endif
    <div class="bg-white p-6 rounded shadow mb-4">
        <p><strong>Nama:</strong> {{ $complaint->name }}</p>
        <p><strong>HP / Email:</strong> {{ $complaint->phone }} / {{ $complaint->email }}</p>
        <p><strong>Pesan:</strong><br>{{ $complaint->message }}</p>
        @if($complaint->attachment)
            <p><strong>Lampiran:</strong> <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank">Lihat</a></p>
        @endif
        <p><strong>Status:</strong> {{ $complaint->status }}</p>
        <form action="{{ route('admin.complaints.status',$complaint->id) }}" method="POST" class="mt-3">
            @csrf
            <label>Ubah status:
                <select name="status" class="p-2 border">
                    <option value="baru" {{ $complaint->status=='baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ $complaint->status=='diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $complaint->status=='selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </label>
            <button class="ml-2 px-3 py-1 bg-yellow-500 text-white rounded">Simpan</button>
        </form>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h2 class="font-bold mb-2">Respons</h2>
        @foreach($complaint->responses as $r)
            <div class="border-b pb-2 mb-2">
                <p><strong>{{ $r->user->name }}</strong> — {{ $r->created_at->format('Y-m-d H:i') }}</p>
                <p>{{ $r->response }}</p>
            </div>
        @endforeach

        <form action="{{ route('admin.complaints.response',$complaint->id) }}" method="POST">
            @csrf
            <label>Balas:
                <textarea name="response" class="w-full p-2 border" required></textarea>
            </label>
            <button class="mt-2 px-3 py-1 bg-blue-600 text-white rounded">Kirim Respons</button>
        </form>
    </div>
</div>
</body>
</html>
