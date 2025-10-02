<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Pengaduan Publik</title>
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
                <img src="{{ asset('logo.png') }}" alt="Logo Sekolah" class="w-16 h-16">
                <div>
                    <!-- Teks sekolah jadi link -->
                    <h1 class="text-xl md:text-2xl font-bold">
                        <a href="https://smpn1situbondo.sch.id/" target="_blank" class="hover:text-blue-600">
                            SMP NEGERI 1 SITUBONDO
                        </a>
                    </h1>
                    <p class="text-sm text-gray-600">Jl. PB Sudirman No.5 Situbondo, Patokan</p>
                </div>
            </div>
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

    <!-- KONTEN UTAMA -->
    <div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">📋 Daftar Pengaduan Publik</h1>
        <a href="{{ route('public.form') }}" class="px-3 py-1 bg-blue-600 text-white rounded mb-4 inline-block">+ Buat Pengaduan</a>

        <table id="complaintsTable" class="display w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $index => $c)
                    <tr onclick="window.location='{{ route('public.show',$c->id) }}'" class="cursor-pointer hover:bg-gray-100">
                        <td>{{ $index+1 }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ Str::limit($c->message, 50) }}</td>
                        <td>
                            <span class="px-2 py-1 rounded text-white 
                                {{ $c->status=='baru' ? 'bg-red-500' : ($c->status=='diproses' ? 'bg-yellow-500' : 'bg-green-600') }}">
                                {{ ucfirst($c->status) }}
                            </span>
                        </td>
                        <td>{{ $c->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $('#complaintsTable').DataTable();
    });
    </script>
</body>
</html>
