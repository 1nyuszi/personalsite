<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
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
                <a href="{{ route('contact.create') }}" class="text-indigo-600 font-semibold">Contact</a>
                <a href="{{ url('/admin') }}" class="text-indigo-600 font-semibold">Admin Panel</a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto p-4">
        <!-- Success Alert Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-8 rounded-lg shadow-sm">
            <h1 class="text-3xl font-bold mb-6 text-gray-900">Get in Touch</h1>
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-medium">Send Message</button>
            </form>
        </div>
    </main>
</body>
</html>