<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard - SMPN1 Situbondo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
<div class="max-w-7xl mx-auto p-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-4 sm:mb-0">Daftar Pengaduan</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow transition duration-200">
                Logout
            </button>
        </form>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-lg mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-lg">
        <table class="w-full text-left divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-gray-600 font-medium">#</th>
                    <th class="p-4 text-gray-600 font-medium">Nama</th>
                    <th class="p-4 text-gray-600 font-medium">Kontak</th>
                    <th class="p-4 text-gray-600 font-medium">Status</th>
                    <th class="p-4 text-gray-600 font-medium">Tanggal</th>
                    <th class="p-4 text-gray-600 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($complaints as $c)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">{{ $c->id }}</td>
                    <td class="p-4">{{ $c->name }}</td>
                    <td class="p-4">{{ $c->phone }} / {{ $c->email }}</td>
                    <td class="p-4">
                        @if($c->status == 'Pending')
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">Pending</span>
                        @elseif($c->status == 'Proses')
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">Proses</span>
                        @elseif($c->status == 'Selesai')
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">Selesai</span>
                        @else
                            <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-semibold">{{ $c->status }}</span>
                        @endif
                    </td>
                    <td class="p-4">{{ $c->created_at->format('Y-m-d H:i') }}</td>
                    <td class="p-4">
                        <a href="{{ route('admin.complaints.show',$c->id) }}" class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow transition duration-200">Lihat</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $complaints->links() }}
    </div>

</div>
</body>
</html>
