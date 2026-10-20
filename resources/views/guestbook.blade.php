<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow p-4 mb-6">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-bold text-xl text-indigo-600">PersonalSite</a>
            <div class="space-x-4">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
                <a href="{{ route('guestbook.index') }}" class="text-indigo-600 font-semibold">Guestbook</a>
                <a href="{{ route('contact.create') }}" class="text-gray-600 hover:text-indigo-600">Contact</a>
                <a href="{{ url('/admin') }}" class="text-indigo-600 font-semibold">Admin Panel</a>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto space-y-8 p-4">
        <!-- Success Alert Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <!-- Sign Guestbook Form -->
        <div class="bg-white p-8 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold mb-4 text-gray-900">Sign my Guestbook</h2>
            <form action="{{ route('guestbook.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 font-medium">Post Message</button>
            </form>
        </div>

        <!-- Approved Entries List -->
        <div class="bg-white p-8 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold mb-6 text-gray-900">Recent Messages</h2>
            <div class="space-y-6">
                @forelse($entries as $entry)
                    <div class="border-b border-gray-100 pb-4 last:border-none">
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-semibold text-gray-800">{{ $entry->name }}</span>
                            <span class="text-xs text-gray-400">{{ $entry->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-600">{{ $entry->message }}</p>
                    </div>
                @empty
                    <p class="text-gray-500 italic">No guestbook entries yet. Be the first to sign!</p>
                @endforelse
            </div>
        </div>
    </main>
</body>
</html>