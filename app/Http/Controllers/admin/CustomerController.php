<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::paginate(10);
        return view('admin.customer.index')->with('customers', $customers);
    }
    /**
     * Display a listing of customers in page select2
     */
    public function customersSelect()
    {
        $customers = Customer::select('id', 'name')->get();
        return response()->json($customers);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'cust_no' => 'required|max:255|unique:customers,cust_no',
            'cust_name' => 'required|max:255',
        ]);
        // Assuming you have a Customer model
        $customer = new Customer();
        $customer->cust_no = $request->input('cust_no');
        $customer->name = $request->input('cust_name');
        $customer->review = $request->input('cust_review');
        $customer->comment = $request->input('cust_comment');
        $customer->about = $request->input('cust_about');
        $customer->rating = $request->input('cust_rating');
        $customer->no_of_reviews = $request->input('cust_num_reviews');
        $customer->date = $request->input('cust_date');
        if ($request->hasFile('cust_image')) {
            // using storage method
            $image = $request->file('cust_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/customers', $filename, 'public');
            $customer->image = 'images/customers/' . $filename;
        }
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        return view('admin.customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'cust_no' => 'required|max:255|unique:customers,cust_no,' . $id,
            'cust_name' => 'required|max:255',
        ]);
        $customer = Customer::findOrFail($id);
        $customer->cust_no = $request->input('cust_no');
        $customer->name = $request->input('cust_name');
        $customer->review = $request->input('cust_review');
        $customer->comment = $request->input('cust_comment');
        $customer->about = $request->input('cust_about');
        $customer->rating = $request->input('cust_rating');
        $customer->no_of_reviews = $request->input('cust_num_reviews');
        $customer->date = $request->input('cust_date');
        if ($request->hasFile('cust_image')) {
            // Delete old image
            if ($customer->image) {
                $oldImagePath = public_path($customer->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Store new image
            $image = $request->file('cust_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images/customers', $filename, 'public');
            $customer->image = 'images/customers/' . $filename;
        }
        $customer->save();
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        if ($customer->image) {
            $imagePath = public_path($customer->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
    }
}
