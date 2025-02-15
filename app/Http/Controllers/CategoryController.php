<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Service Type List';
        $data['categories'] = Category::all();
        return view('backend.admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add New Service Type';
        return view('backend.admin.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Create new category
        $row = new Category();
        $row->name = $request->name;
        $row->slug = Str::slug($request->name);
        $row->status = $request->status;
        $row->save();

        return redirect()->back()->with('success', 'Category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $data['title'] = 'Edit Service Type';

        $data['category'] = Category::where('slug', $slug)->firstOrFail();

        return view('backend.admin.category.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'boolean',
    ]);

    try {
        // Find the category
        $row = Category::findOrFail($id);

        // Update category fields
        $row->name = $request->name;
        $row->status = $request->status;
        $row->slug = Str::slug($request->name);
        $row->save();

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
      $category = Category::find($id);
      $category->delete();
      return redirect()->back()->with('success', 'Category deleted successfully.');
    }

}
