<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::query()->orderByDesc('id')->paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $faq = Faq::query()->create([
            'question_ru' => $request->input('question_ru'),
            'answer_ru' => $request->input('answer_ru'),
            'question_en' => $request->input('question_en'),
            'answer_en' => $request->input('answer_en'),
        ]);

        return redirect()->route('faq.show', $faq->id);
    }

    public function show(\App\Models\Faq $faq)
    {
        return view('admin.faq.show', compact('faq'));
    }

    public function edit(\App\Models\Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, \App\Models\Faq $faq)
    {
        $faq->update([
            'question_ru' => $request->input('question_ru'),
            'answer_ru' => $request->input('answer_ru'),
            'question_en' => $request->input('question_en'),
            'answer_en' => $request->input('answer_en'),
        ]);
        return redirect()->route('faq.show', $faq->id);
    }

    public function destroy(\App\Models\Faq $faq)
    {
        $faq->delete();
    }

}
