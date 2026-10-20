<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-bold text-xl text-indigo-600">PersonalSite</a>
            <div class="space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
                <a href="{{ route('guestbook.index') }}" class="text-gray-600 hover:text-indigo-600">Guestbook</a>
                <a href="{{ route('contact.create') }}" class="text-gray-600 hover:text-indigo-600">Contact</a>
                <a href="{{ url('/admin') }}" class="text-indigo-600 font-semibold">Admin Panel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Box -->
    <main class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-sm">
        <h1 class="text-3xl font-bold mb-6 text-gray-900">{{ $page->title }}</h1>
        <div class="prose max-w-none text-gray-700 leading-relaxed">
            {!! $page->content !!}
        </div>
    </main>
</body>
</html>