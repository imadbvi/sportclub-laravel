<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    public function index()
    {
        return view('admin.faqs.index');
    }

    
    public function create()
    {
        return view('admin.faqs.create');
    }

    
    public function store(Request $request)
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect('/admin/faqs');
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
