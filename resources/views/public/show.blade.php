<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
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
        <p class="mt-2"><a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="text-blue-600 underline">📎 Lihat Lampiran</a></p>
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
