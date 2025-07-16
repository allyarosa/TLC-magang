<?php

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        // Get search query if present
        $search = $request->input('search');

        // Base query
        $query = News::query()->latest();

        // Apply search filter if search parameter exists
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Get news with pagination (10 items per page)
        $news = $query->paginate(10);

        // Get total count of news
        $newsCount = News::count();

        return view('admin.news.index', compact('news', 'newsCount'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:500',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $validated['image'] = $imagePath;
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Create new news article
        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Cari berita berdasarkan ID
        $news = News::findOrFail($id);

        // Tampilkan view detail berita
        return view('admin.news.show', compact('news'));
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }


// Debug version of update function
public function update(Request $request, $id)
{
    // Find the news by ID (explicit way to ensure we're getting the right record)
    $news = News::findOrFail($id);

    // Log before update state
    // Log::info('Before update - News ID: ' . $id, [
    //     'title' => $news->title,
    //     'summary' => $news->summary,
    //     'current_data' => $news->toArray()
    // ]);

    // Validate the request
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'summary' => 'required|string|max:500',
        'content' => 'required|string',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Always create a slug from the title
    $validated['slug'] = Str::slug($validated['title']);

    // Log the validated data
    // \Log::info('Validated data for update', $validated);

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        // Store new image
        $imagePath = $request->file('image')->store('news', 'public');
        $validated['image'] = $imagePath;
    }

    // Update the news article using fill and save (alternative to update())
    $news->fill($validated);
    $saved = $news->save();

    // Log the result of the save operation and the updated data
    // \Log::info('After update - Save result: ' . ($saved ? 'Success' : 'Failed'), [
    //     'updated_data' => $news->fresh()->toArray()
    // ]);

    return redirect()->route('admin.news.index')
        ->with('success', 'Berita berhasil diperbarui.');
}
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        // Delete news article
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function destroyAll()
    {
        // Get all news articles
        $allNews = News::all();

        // Delete all images
        foreach ($allNews as $news) {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }
        }

        // Delete all news articles
        News::truncate();

        return redirect()->route('admin.news.index')
            ->with('success', 'Semua berita berhasil dihapus.');
    }

    public function export()
    {
        // This is a placeholder for Excel export functionality
        // You'll need to install maatwebsite/excel package for full functionality

        /*
        // Example implementation with Laravel Excel:
        return Excel::download(new NewsExport, 'news.xlsx');
        */

        // For now, we'll return a notification that export is not implemented yet
        return redirect()->route('admin.news.index')
            ->with('info', 'Fitur export sedang dalam pengembangan.');
    }
}
