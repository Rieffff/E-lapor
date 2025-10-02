@extends('public.layouts.app')
@section('title')
Detail Pengaduan
@endsection
@section('content')

<div class="max-w-5xl mx-auto p-8 bg-white rounded-xl shadow-lg">
    <!-- Judul -->
    <h1 class="text-2xl font-bold mb-6 border-b pb-3 text-gray-800">
        📌 Detail Pengaduan
    </h1>

    <!-- Info Utama -->
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <p class="mb-2"><span class="font-semibold text-gray-700">👤 Nama:</span> {{ $complaint->name }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-700">📧 Email:</span> {{ $complaint->email }}</p>
            <p class="mb-2"><span class="font-semibold text-gray-700">📱 No HP:</span> {{ $complaint->phone }}</p>
        </div>
        <div>
            <p class="mb-2"><span class="font-semibold text-gray-700">📌 Status:</span> 
                <span class="px-3 py-1 text-sm rounded-full text-white shadow
                    {{ $complaint->status=='baru' ? 'bg-red-500' : ($complaint->status=='diproses' ? 'bg-yellow-500' : 'bg-green-600') }}">
                    {{ ucfirst($complaint->status) }}
                </span>
            </p>
        </div>
    </div>

    <!-- Isi Laporan -->
    <div class="mt-6 bg-gray-50 border-l-4 border-blue-500 p-4 rounded">
        <h2 class="text-lg font-semibold mb-2">📝 Laporan:</h2>
        <p class="text-gray-700 leading-relaxed">{{ $complaint->message }}</p>
    </div>

    <!-- Lampiran -->
    @if($complaint->attachment)
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2">📎 Lampiran:</h2>
            @php
                $ext = pathinfo($complaint->attachment, PATHINFO_EXTENSION);
            @endphp

            @if(in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp']))
                <img src="{{ asset('storage/' . $complaint->attachment) }}" 
                     alt="Lampiran" 
                     class="max-h-80 rounded border shadow-md">
            @else
                <a href="{{ asset('storage/' . $complaint->attachment) }}" 
                   target="_blank" 
                   class="text-blue-600 underline">
                   📂 Unduh Lampiran
                </a>
            @endif
        </div>
    @endif

    <!-- Respon Admin -->
    <div class="mt-8">
        <h2 class="text-lg font-semibold mb-3">💬 Respon Admin:</h2>
        @forelse($complaint->responses as $r)
            <div class="mb-4 p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-sm">
                <p class="text-sm text-gray-600 mb-1">
                    👨‍💼 {{ $r->user->name }} 
                    <span class="text-xs text-gray-500">({{ $r->created_at->format('d-m-Y H:i') }})</span>
                </p>
                <p class="text-gray-800">{{ $r->response }}</p>
            </div>
        @empty
            <p class="italic text-gray-500">Belum ada respon dari admin.</p>
        @endforelse
    </div>

    <!-- Tombol kembali -->
    <div class="mt-8 text-right">
        <a href="{{ route('public.list') }}" 
           class="inline-block px-5 py-2 bg-gray-700 hover:bg-gray-800 text-white font-semibold rounded-lg shadow">
           ← Kembali ke Daftar
        </a>
    </div>
</div>

@endsection
