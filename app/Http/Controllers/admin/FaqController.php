<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faqs = Faqs::paginate(10);
        return view('admin.faq.index')->with('faqs', $faqs);
    }

    /**
     * Display a listing of FAQs in page select2
     */
    public function faqsSelect()
    {
        $faqs = Faqs::select('id', 'question')->get();
        return response()->json($faqs);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'faq_ques' => 'required|max:255',
            'faq_ans' => 'required',
        ]);
        // Assuming you have a Faq model
        $faq = new Faqs();
        $faq->question = $request->input('faq_ques');
        $faq->answer = $request->input('faq_ans');
        $faq->save();
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $faq = Faqs::findOrFail($id);
        return view('admin.faq.edit')->with('faq', $faq);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'faq_ques' => 'required|max:255',
            'faq_ans' => 'required',
        ]);
        $faq = Faqs::findOrFail($id);
        $faq->question = $request->input('faq_ques');
        $faq->answer = $request->input('faq_ans');
        $faq->save();
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $faq = Faqs::findOrFail($id);
        if ($faq) {
            $faq->delete();
            return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
        } else {
            return redirect()->route('faq.index')->with('error', 'FAQ not found.');
        }
    }
}
