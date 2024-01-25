<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at')->get();

        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'platenumber' => 'required|string',
            'currentcolor' => 'required|string',
            'targetcolor' => 'required|string',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->platenumber = $request->platenumber;
        $product->currentcolor = $request->currentcolor;
        $product->targetcolor = $request->targetcolor;

        // Set status as "in progress"
        $product->status = "in progress";

        // Save the product
        $product->save();

        // Redirect back with success message
        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

    /**
     * Update the status of the specified resource to "done".
     */
    public function updateStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->status = "done";
        $product->save();

        return redirect()->back()->with('success', 'Product status updated to Done.');
    }
}
