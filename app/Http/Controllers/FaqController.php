<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = $request->input('search');

        $categories = Category::with([
            'faqs' => function ($q) use ($query) {
                if ($query) {
                    $q->where('question', 'like', "%{$query}%")
                        ->orWhere('answer', 'like', "%{$query}%");
                }
            }
        ])
            ->whereHas('faqs', function ($q) use ($query) {
                if ($query) {
                    $q->where('question', 'like', "%{$query}%")
                        ->orWhere('answer', 'like', "%{$query}%");
                }
            })
            ->get();

        return view('faq.index', compact('categories', 'query'));
    }
}
