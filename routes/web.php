<?php

use App\Http\Controllers\PageController;
use App\Models\Guestbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. Static / Feature Routes (Must come BEFORE /{slug})
Route::get('/guestbook', function () {
    $entries = Guestbook::where('is_approved', true)->latest()->get();
    return view('guestbook', compact('entries'));
})->name('guestbook.index');

Route::post('/guestbook', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
    ]);

    Guestbook::create([
        'name' => $validated['name'],
        'message' => $validated['message'],
        'is_approved' => false,
    ]);

    return redirect()->route('guestbook.index')->with('success', 'Thank you! Your message has been submitted for approval.');
})->name('guestbook.store');

Route::get('/contact', function () {
    return view('contact');
})->name('contact.create');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:2000',
    ]);

    \App\Models\ContactMessage::create($validated);

    return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
})->name('contact.store');

// 2. Dynamic CMS Page Routes (Must come AFTER specific routes)
Route::get('/', [PageController::class, 'show'])->name('home');
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');