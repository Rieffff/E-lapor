<<<<<<< Updated upstream
@extends('public.layouts.app')
@section('title')
Daftar Pengaduan Publik
@endsection
@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl p-10">
        <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8">Form Pengaduan</h1>
        <p class="text-center text-gray-500 mb-8">SMPN 1 Situbondo</p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-6 py-3 rounded-lg mb-6 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('public.submit') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-user"></i>
                </span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama Anda" class="w-full pl-10 p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- No. HP -->
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-phone"></i>
                </span>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Nomor HP" class="w-full pl-10 p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Email -->
            <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Anda" class="w-full pl-10 p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Pesan -->
            <div>
                <textarea name="message" placeholder="Tulis pesan Anda..." class="w-full p-3 border border-gray-300 rounded-xl h-32 focus:outline-none focus:ring-2 focus:ring-blue-400" required>{{ old('message') }}</textarea>
            </div>

            <!-- Lampiran -->
            <div>
                <label class="block text-gray-600 font-medium mb-2">Lampiran (Opsional)</label>
                <input type="file" name="attachment" class="w-full text-gray-500">
            </div>

            <!-- Tombol -->
            <div class="text-center">
                <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold rounded-xl shadow-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                    Kirim Pengaduan
                </button>
            </div>
        </form>
    </div>
=======
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pengaduan - SMPN 1 Situbondo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
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
            <input type="file"  accept="image/png, image/gif, image/jpeg"  name="attachment">
        </label>
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Kirim</button>
    </form>
>>>>>>> Stashed changes
</div>
@endsection
