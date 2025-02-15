<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create()
    {
       return view('backend.admin.properties.create');
    }
     public function index()
     {
        $data['products'] = Product::all();
        return view('backend.admin.properties.index', $data);
     }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('uploads', $imageName, 'public');
        }

        // Create a new Product instance
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->image = $imageName;
        $product->description = $request->description;

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('uploads', $filename, 'public');
                    ImageGallery::create([
                        'product_id' => $product->id,
                        'images' => '/public/uploads/' . $filename,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        return view('backend.admin.properties.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $product = Product::find($id);

    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // image is optional during update
        'description' => 'required',
    ]);

    // Handle image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Generate a unique name for the new image
        $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

        // Delete the old image if it exists
        if ($product->image && \Storage::disk('public')->exists('uploads/' . $product->image)) {
            \Storage::disk('public')->delete('uploads/' . $product->image);
        }

        // Store the new image
        $request->file('image')->storeAs('uploads', $imageName, 'public');

        // Update the product's image field
        $product->image = $imageName;
    }

    // Update the product's other fields
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    // Save the updated product to the database
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
