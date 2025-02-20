<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\properties;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use PhpParser\Builder\Property;

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

        $data['row'] = properties::get();

        return view('backend.admin.properties.property_index', $data);
     }


     public function property_edit($slug)
     {
        $data['title'] = 'Service Edit';

        $data['property'] = properties::where('slug', $slug)->firstOrFail();

        return view('backend.admin.properties.edit', $data);
     }



     public function property_show($slug)
     {
        $data['title'] = 'Service Show';

        $data['property'] = properties::where('slug', $slug)->firstOrFail();

        return view('backend.admin.properties.show', $data);
     }


        public function property_delete($id)
    {
        try {
            $property = Properties::findOrFail($id);
            $property->delete();

            return redirect()->back()->with('success', 'Property deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete property.');
        }
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:0,1',
    ]);

    // Find the product
    $product = Product::findOrFail($id);

    // Handle updating the product's main image
    $imageName = $product->image; // Keep old image if not replaced
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }

        // Upload new image
        $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads', $imageName, 'public');
        $imageName = 'public/uploads/' . $imageName;
    }

    // Update product details
    $product->name = $request->name;
    $product->slug = Str::slug($request->name);
    $product->status = $request->status;
    $product->image = $imageName;
    $product->description = $request->description;
    $product->category_id = $request->category_id;
    $product->save();

    // Handle multiple images for the product
    if ($request->hasFile('images')) {
        // Remove old images from ImageGallery
        foreach ($product->images as $image) {
            if (file_exists(public_path($image->images))) {
                unlink(public_path($image->images));
            }
            $image->delete();
        }

        // Upload and store new images
        foreach ($request->file('images') as $file) {
            if ($file->isValid()) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('uploads', $filename, 'public');

                ImageGallery::create([
                    'product_id' => $product->id,
                    'images' => 'public/uploads/' . $filename,
                ]);
            }
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}


    public function edit($slug)
    {
        $data['title'] = 'Service Edit';
        $data['product'] = Product::where('slug',$slug)->firstOrFail();
        $data['categories'] = Category::all();
        return view('backend.admin.service.edit', $data);
    }

    public function delete($id)
    {
        try {
            $service = Product::findOrFail($id);
            $service->delete();

            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete Service.');
        }
    }


public function property_store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'before_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'after_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:10240',
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
    if ($request->hasFile('video')) {
        $videoName = time() . '_video.' . $request->file('video')->extension();
        $request->file('video')->storeAs('uploads/property', $videoName, 'public');
        $property->video = 'public/uploads/property/' . $videoName;
    }

    $property->save();

    return redirect()->route('property_index')->with('success', 'Property created successfully.');
}



}
