<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
   
    public function index(Request $request)
    {
        $search = $request->search;
        
        $articles = Article::when($search, function($query) use ($search) {
            return $query->where('title', 'LIKE', "%{$search}%")
                         ->orWhere('description', 'LIKE', "%{$search}%");
        })->latest()->paginate(10);
        
        // Keep search parameter when navigating through pagination
        if ($search) {
            $articles->appends(['search' => $search]);
        }
        
        return view('admin.article', compact('articles'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload and save image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('articles', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Save new article
        Article::create($validated);

        return redirect()->route('admin.article.index')
            ->with('success', 'Article created successfully!');
    }

   
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update image if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }

            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('articles', $imageName, 'public');
            $validated['image'] = $path;
        }

        // Update article
        $article->update($validated);

        return redirect()->route('admin.article.index')
            ->with('success', 'Article updated successfully!');
    }

   
    public function destroy(Article $article)
    {
        // Delete related image if exists
        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        // Delete article
        $article->delete();

        return redirect()->route('admin.article.index')
            ->with('success', 'Article deleted successfully!');
    }
}