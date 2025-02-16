<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\properties;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create()
    {
        $data['title'] = 'Service Create';
        $data['categories'] = Category::all();
       return view('backend.admin.service.create',$data);
    }

    public function property_create()
    {
        $data['title'] = 'Property Create';

       return view('backend.admin.properties.property_create',$data);
    }

     public function index()
     {
        $data['products'] = Product::all();
        $data['title'] = 'Service List';

        return view('backend.admin.service.index', $data);
     }

     public function property_index()
     {
        $data['title'] = 'Property List';

        $data['row'] = properties::where('status','1')->get();

        return view('backend.admin.properties.property_index', $data);
     }


     public function show($slug)
     {
        $data['title'] = 'Service view';
        $data['product'] = Product::where('slug',$slug)->firstOrFail();
        return view('backend.admin.service.show', $data);
     }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
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
        $product->status = $request->status;
        $product->image = 'public/uploads/'.$imageName;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        return view('backend.admin.properties.edit', $data);
    }

    public function update(Request $request, $id)
{
    $product = Product::find($id);

    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'description' => 'required',
    ]);

    if ($request->hasFile('image')) {

        $imageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();


        if ($product->image && \Storage::disk('public')->exists('uploads/' . $product->image)) {
            \Storage::disk('public')->delete('uploads/' . $product->image);
        }

        $request->file('image')->storeAs('uploads', $imageName, 'public');
        $product->image = $imageName;
    }

    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    $product->save();

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}



public function property_store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'before_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'after_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'status' => 'required',
    ]);

    $property = new Properties();
    $property->title = $request->title;
    $property->description = $request->description;
    $property->status = $request->status;
    $property->slug = Str::slug($request->title);

    if ($request->hasFile('before_image')) {
        $beforeImageName = time() . '_before.' . $request->file('before_image')->extension();
        $request->file('before_image')->storeAs('uploads/property', $beforeImageName, 'public');
        $property->before_image = 'public/uploads/property/' . $beforeImageName;
    }

    if ($request->hasFile('after_image')) {
        $afterImageName = time() . '_after.' . $request->file('after_image')->extension();
        $request->file('after_image')->storeAs('uploads/property', $afterImageName, 'public');
        $property->after_image = 'public/uploads/property/' . $afterImageName;
    }

    $property->save();

    return redirect()->route('property_index')->with('success', 'Property created successfully.');
}



}
