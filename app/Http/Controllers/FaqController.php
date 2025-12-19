<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $categories = Category::with('faqs')->whereHas('faqs')->get();

        return view('faq.index', compact('categories'));
    }
}
