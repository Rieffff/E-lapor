<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login - SMPN1 Situbondo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="max-w-md mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Admin Login</h1>
    @if($errors->any())
        <div class="bg-red-100 p-3 mb-4">{{ $errors->first() }}</div>
    @endif
    <form action="{{ route('admin.login.post') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <label class="block mb-2">Email
            <input type="email" name="email" class="w-full p-2 border" required>
        </label>
        <label class="block mb-4">Password
            <input type="password" name="password" class="w-full p-2 border" required>
        </label>
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
    </form>
</div>
</body>
</html>
