<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pages = Page::paginate(10);
        return view('admin.page.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'title_slug' => 'required|max:255|unique:pages,slug',
        ]);
        // Assuming you have a Page model
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = $request->input('title_slug');
        $page->meta_title = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        $page->meta_keywords = $request->input('meta_keywords');
        $page->writer_title = $request->input('writer_title');
        $page->writer_content = $request->input('writer_content');
        $page->faq_title = $request->input('faqs_title');
        $page->faq_content = $request->input('faq_content');
        $page->customer_title = $request->input('customer_title');
        $page->customer_content = $request->input('customer_content');
        // image upload
        if ($request->hasFile('page_image')) {
            // using storage method
            $image = $request->file('page_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/pages', $filename, 'public');
            $page->page_image = 'images/pages/' . $filename;
        } else {
            $page->page_image = null;
        }
        $page->page_image_alt = $request->input('page_image_alt');
        $page->status = $request->input('page_status');

        $page->save();
        // relationship with writers
        if ($request->has('writers')) {
            $page->writers()->sync($request->input('writers'));
        }
        // relationship with customers
        if ($request->has('customers')) {
            $page->customers()->sync($request->input('customers'));
        }
        // relationship with faqs
        if ($request->has('faqs')) {
            $page->faqs()->sync($request->input('faqs'));
        }

        return redirect()->route('page.index')->with('success', 'Page created successfully.');
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
        $page = Page::findOrFail($id);
        // get loop of writers
        $writers = $page->writers()->get();
        // get loop of customers
        $customers = $page->customers()->get();
        // get loop of faqs
        $faqs = $page->faqs()->get();
        if ($page) {
            return view('admin.page.edit')->with('page', $page)
                ->with('writers', $writers)
                ->with('customers', $customers)
                ->with('faqs', $faqs);
        } else {
            return redirect()->route('page.index')->with('error', 'Page not found.');
        }
    }
    /**
     * 
     * 
     * 
     * show selected writers by page id in select2
     */
    public function getWritersByPageId(string $id)
    {
        //
        $page = Page::findOrFail($id);
        $writers = $page->writers()->get();
        return response()->json($writers);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'title_slug' => 'required|max:255|unique:pages,slug,' . $id,
        ]);
        $page = Page::findOrFail($id);
        if ($page) {
            $page->title = $request->input('title');
            $page->slug = $request->input('title_slug');
            $page->meta_title = $request->input('meta_title');
            $page->meta_description = $request->input('meta_description');
            $page->meta_keywords = $request->input('meta_keywords');
            $page->writer_title = $request->input('writer_title');
            $page->writer_content = $request->input('writer_content');
            $page->faq_title = $request->input('faqs_title');
            $page->faq_content = $request->input('faq_content');
            $page->customer_title = $request->input('customer_title');
            $page->customer_content = $request->input('customer_content');

            // image upload
            if ($request->hasFile('page_image')) {
                // using storage method
                $image = $request->file('page_image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('images/pages', $filename, 'public');
                $page->page_image = 'images/pages/' . $filename;
            }
            // image alt
            $page->page_image_alt = $request->input('page_image_alt');
            // status
            $page->status = $request->input('page_status');

            // relationship with writers
            if ($request->has('writers')) {
                // sync the writers with the page
                $page->writers()->sync($request->input('writers'));
            }
            // relationship with customers
            if ($request->has('customers')) {
                // sync the customers with the page
                $page->customers()->sync($request->input('customers'));
            }
            // relationship with faqs
            if ($request
                ->has('faqs')
            ) {
                // sync the faqs with the page
                $page->faqs()->sync($request->input('faqs'));
            }
            $page->save();
            return redirect()->route('page.index')->with('success', 'Page updated successfully.');
        } else {
            return redirect()->route('page.index')->with('error', 'Page not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $page = Page::findOrFail($id);
        if ($page) {
            $page->delete();
            return redirect()->route('page.index')->with('success', 'Page deleted successfully.');
        } else {
            return redirect()->route('page.index')->with('error', 'Page not found.');
        }
    }
}
