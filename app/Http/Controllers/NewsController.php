<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    
    public function create()
    {
        return view('news.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:5',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuws succesvol aangemaakt.');
    }

    
    public function show(News $news)
{
    return view('news.show', compact('news'));
}

public function edit(News $news)
{
    return view('news.edit', compact('news'));
}

public function update(Request $request, News $news)
{
    $request->validate([
        'title' => 'required|min:3',
        'content' => 'required|min:5',
        'image' => 'nullable|image|max:2048'
    ]);

    
    if ($request->hasFile('image')) {

        
        if ($news->image && \Storage::disk('public')->exists($news->image)) {
            \Storage::disk('public')->delete($news->image);
        }

        $news->image = $request->file('image')->store('news_images', 'public');
    }

    
    $news->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('news.index')
                     ->with('success', 'Nieuws succesvol bijgewerkt.');
}

public function destroy(News $news)
{
    
    if ($news->image && \Storage::disk('public')->exists($news->image)) {
        \Storage::disk('public')->delete($news->image);
    }

    
    $news->delete();

    return redirect()->route('news.index')
                     ->with('success', 'Nieuws succesvol verwijderd.');
}


}
