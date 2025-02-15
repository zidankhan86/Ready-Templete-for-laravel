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

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|max:255',
    //         'price' => 'required|numeric',
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    //         'description' => 'required',
    //     ]);

    //     $imageName = null;
    //     if ($request->hasFile('image')) {
    //         $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
    //         $request->file('image')->storeAs('uploads', $imageName, 'public');
    //     }

    //     // Create a new Product instance
    //     $product = new Product;
    //     $product->name = $request->name;
    //     $product->slug = Str::slug($request->name);
    //     $product->price = $request->price;
    //     $product->image = $imageName;
    //     $product->description = $request->description;

    //     $product->save();

    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $file) {
    //             if ($file->isValid()) {
    //                 $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
    //                 $filePath = $file->storeAs('uploads', $filename, 'public');
    //                 ImageGallery::create([
    //                     'product_id' => $product->id,
    //                     'images' => '/public/uploads/' . $filename,
    //                 ]);
    //             }
    //         }
    //     }

    //     return redirect()->route('products.index')->with('success', 'Product created successfully');

    // }

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

//     public function update(Request $request, $id)
// {
//     $product = Product::find($id);

//     $request->validate([
//         'name' => 'required|max:255',
//         'price' => 'required|numeric',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
//         'description' => 'required',
//     ]);

//     if ($request->hasFile('image')) {

//         $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();


//         if ($product->image && \Storage::disk('public')->exists('uploads/' . $product->image)) {
//             \Storage::disk('public')->delete('uploads/' . $product->image);
//         }

//         $request->file('image')->storeAs('uploads', $imageName, 'public');
//         $product->image = $imageName;
//     }

//     $product->name = $request->input('name');
//     $product->price = $request->input('price');
//     $product->description = $request->input('description');

//     $product->save();

//     return redirect()->route('products.index')->with('success', 'Product updated successfully');
// }



    public function destroy(Product $product)
    {
        //
    }
}
