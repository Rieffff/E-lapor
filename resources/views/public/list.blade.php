@extends('public.layouts.app')
@section('title')
Daftar Pengaduan Publik
@endsection
@section('content')
    <!-- KONTEN UTAMA -->
    <div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
        <h1 class="text-2xl font-bold mb-4">📋 Daftar Pengaduan Publik</h1>
        <a href="{{ route('public.form') }}" class="px-3 py-1 bg-blue-600 text-white rounded mb-4 inline-block">+ Buat Pengaduan</a>
        
        <div class="overflow-x-auto">   
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
    </div>
@endsection