<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Writer;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $writers = Writer::paginate(10);
        return view('admin.writer.index')->with('writers', $writers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.writer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'writer_name' => 'required|max:255',
            'writer_no' => 'required|max:255|unique:writers,writer_no',
            'writer_slug' => 'required|max:255|unique:writers,slug',
        ]);
        // Assuming you have a Writer model
        $writer = new Writer();
        $writer->name = $request->input('writer_name');
        $writer->slug = $request->input('writer_slug');
        $writer->writer_no = $request->input('writer_no');
        $writer->about = $request->input('writer_about');

        $writer->education = $request->input('writer_edu');
        $writer->profession = $request->input('writer_profession');
        $writer->status = $request->input('writer_status');
        $writer->experience = $request->input('writer_exp');
        $writer->rating = $request->input('writer_rat');
        $writer->no_of_review = $request->input('writer_rev');
        $writer->order = $request->input('writer_ord');
        $writer->scucess_rate = $request->input('writer_success_rate');
        $writer->on_time_rate = $request->input('writer_on_time_rate');
        $writer->competences = $request->input('writer_competences');
        $writer->works = $request->input('writer_works');
        $writer->online_status = $request->input('writer_online_status');
        $writer->delivery_time = $request->input('writer_delivery');
        $writer->subjects = $request->input('writer_subjects');
        $writer->reviews = $request->input('writer_reviews');
        if ($request->hasFile('writer_image')) {
            // using storage method
            $image = $request->file('writer_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/writers', $filename, 'public');
            $writer->image = 'images/writers/' . $filename;
        }
        $writer->save();
        return redirect()->route('writer.index')->with('success', 'Writer created successfully.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
