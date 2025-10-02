@extends('public.layouts.app')
@section('title')
Daftar Pengaduan Publik
@endsection
@section('content')
    <!-- FORM PENGADUAN -->
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Form Pengaduan - SMPN 1 Situbondo</h1>
        @if(session('success'))
            <div class="bg-green-100 p-3 mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('public.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <label class="block mb-2">Nama
                <input type="text" name="name" value="{{ old('name') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">No. HP
                <input type="text" name="phone" value="{{ old('phone') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">Email
                <input type="email" name="email" value="{{ old('email') }}" class="w-full p-2 border" required>
            </label>
            <label class="block mb-2">Pesan
                <textarea name="message" class="w-full p-2 border" required>{{ old('message') }}</textarea>
            </label>
            <label class="block mb-4">Lampiran (opsional)
                <input type="file" name="attachment">
            </label>
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Kirim</button>
        </form>
    </div>
@endsection