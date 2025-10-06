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
                <p class="mb-2"><span class="font-semibold text-gray-700">👤 Nama:</span> {{ maskMiddle($complaint->name) }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-700">📧 Email:</span> {{ maskMiddle($complaint->email) }}</p>
                <p class="mb-2"><span class="font-semibold text-gray-700">📱 No HP:</span> {{ maskMiddle($complaint->phone) }}</p>
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
            <h2 class="text-lg font-semibold mb-2">📝 Laporan:</h2>
            <p class="text-gray-700 leading-relaxed">{{ $complaint->message }}</p>
        </div>

        <!-- Respon Admin -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-3">💬 Respon Admin:</h2>
            <div class="space-y-4 divide-y divide-gray-200">
                @forelse($complaint->responses as $r)
                    <div class="pt-4 first:pt-0">
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
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-6">
        {{ $complaints->links('pagination::tailwind') }}
    </div>
</div>
@endsection
