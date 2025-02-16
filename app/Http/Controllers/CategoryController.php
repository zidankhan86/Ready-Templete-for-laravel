<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Category List';
        $data['categories'] = Category::all();
        return view('backend.admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add New Category';
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
        $row->status = $request->status; // Default to 0 if not provided
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
    public function edit(Category $slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
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
