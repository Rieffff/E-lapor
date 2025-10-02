<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - SMPN1 Situbondo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Pengaduan</h1>
        <form action="{{ route('admin.logout') }}" method="POST">@csrf<button class="px-3 py-1 bg-red-600 text-white rounded">Logout</button></form>
    </div>
    @if(session('success'))<div class="bg-green-100 p-3 mb-4">{{ session('success') }}</div>@endif
    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="text-left border-b">
                <th class="p-3">#</th>
                <th class="p-3">Nama</th>
                <th class="p-3">Kontak</th>
                <th class="p-3">Status</th>
                <th class="p-3">Tanggal</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($complaints as $c)
            <tr class="border-b">
                <td class="p-3">{{ $c->id }}</td>
                <td class="p-3">{{ $c->name }}</td>
                <td class="p-3">{{ $c->phone }} / {{ $c->email }}</td>
                <td class="p-3">{{ $c->status }}</td>
                <td class="p-3">{{ $c->created_at->format('Y-m-d H:i') }}</td>
                <td class="p-3"><a href="{{ route('admin.complaints.show',$c->id) }}" class="px-2 py-1 bg-blue-600 text-white rounded">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">{{ $complaints->links() }}</div>
</div>
</body>
</html>
