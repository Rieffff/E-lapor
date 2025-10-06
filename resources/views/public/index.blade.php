@extends('public.layouts.app')
@section('title', 'Daftar Pengaduan')

@php
    function maskMiddle($value) {
        $len = strlen($value);
        if ($len <= 3) return $value; // biar aman kalau terlalu pendek

        $start = substr($value, 0, 2);
        $end = substr($value, -1);
        $masked = str_repeat('*', $len - 3);

        return $start . $masked . $end;
    }
@endphp

@section('content')
<div class="max-w-5xl mx-auto p-8 bg-white rounded-xl shadow-lg">
    <!-- Judul -->
    <h1 class="text-2xl font-bold mb-6 border-b pb-3 text-gray-800">
        📌 Daftar Pengaduan
    </h1>

    @foreach ($complaints as $complaint)
    <div class="mb-8 p-6 bg-gray-50 rounded-xl shadow border border-gray-200 hover:shadow-md transition">
        <!-- Info Utama -->
        <div class="grid md:grid-cols-2 gap-6">
            <div>
               
            </div>
            <div class="flex items-start md:justify-end">
                @php
                    $statusColors = [
                        'baru' => 'bg-red-500',
                        'diproses' => 'bg-yellow-500',
                        'selesai' => 'bg-green-600',
                    ];
                @endphp
                <span class="px-3 py-1 text-sm rounded-full text-white shadow {{ $statusColors[$complaint->status] ?? 'bg-gray-500' }}">
                    {{ ucfirst($complaint->status) }}
                </span>
            </div>
        </div>

        <!-- Isi Laporan -->
        <div class="mt-4 bg-white border-l-4 border-blue-500 p-4 rounded">
             <p class="mb-2"><span class="font-semibold text-gray-700">👤 Nama:</span> {{ maskMiddle($complaint->name) }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-700">📧 Email:</span> {{ maskMiddle($complaint->email) }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-700">📱 No HP:</span> {{ maskMiddle($complaint->phone) }}</p>
            <h2 class="text-lg font-semibold mb-2">📝 Laporan:</h2>
            <p class="text-gray-700 leading-relaxed max-width-400">{{ $complaint->message }}</p>
        </div>

        <!-- Respon Admin -->
        <div class="mt-6">
    <h2 class="text-lg font-semibold mb-3">💬 Respon Admin:</h2>
    <div class="space-y-6 divide-y divide-gray-200">
        @forelse($complaint->responses as $r)
            <div class="pt-6 first:pt-0 flex items-start space-x-4" x-data="{ open: false }">
                <!-- Foto Profil -->
                <div class="flex flex-col items-center w-20">
                    <img src="{{ asset('storage/profile/'.$r->user->photos) }}" 
                         alt="Foto {{ $r->user->name }}" 
                         class="w-16 h-16 rounded-full object-cover shadow-md cursor-pointer hover:opacity-80 transition"
                         @click="open = true">

                    <p class="text-sm font-semibold text-gray-800 mt-2">{{ $r->user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $r->user->Role }}</p>
                </div>

                <!-- Isi Respon -->
                <div class="flex-1 bg-blue-50 border border-blue-200 rounded-lg shadow-sm p-4">
                    <p class="text-xs text-gray-500 mb-2">
                        🕒 {{ $r->created_at->format('d-m-Y H:i') }}
                    </p>
                    <p class="text-gray-800 leading-relaxed">{{ $r->response }}</p>
                </div>

                <!-- Modal Popup -->
                <div x-show="open" 
                     x-transition 
                     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                     @click.self="open = false">
                    <div class="bg-white p-4 rounded-lg shadow-lg max-w-md w-full text-center">
                        <img src="{{ asset('storage/profile/'.$r->user->photos) }}" 
                             alt="Foto {{ $r->user->name }}" 
                             class="mx-auto rounded-lg max-h-[70vh] object-contain">
                        <p class="mt-3 font-semibold text-gray-800">{{ $r->user->name }}</p>
                        <p class="text-sm text-gray-500">{{ $r->user->role }}</p>
                        <button @click="open = false" 
                                class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <p class="italic text-gray-500">Belum ada respon dari admin.</p>
        @endforelse
    </div>
</div>


    </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-6">
        {{ $complaints->links('pagination::tailwind') }}
    </div>
</div>
@endsection
