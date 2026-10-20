<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show($slug = 'home')
    {
        // Find the published page by slug, or fail with a 404 if it doesn't exist
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        return view('page', compact('page'));
    }
}
