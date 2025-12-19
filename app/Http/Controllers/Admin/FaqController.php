<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::with('category')->latest()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')
            ->with('success', 'Vraag succesvol toegevoegd.');
    }

    public function edit(Faq $faq)
    {
        $categories = \App\Models\Category::all();
        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')
            ->with('success', 'Vraag succesvol bijgewerkt.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')
            ->with('success', 'Vraag verwijderd.');
    }
}
