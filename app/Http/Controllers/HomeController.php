<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\properties;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['total_properties'] = properties::count();
        $data['total_service'] = Product::count();
        $data['total_categories'] = Category::count();
        $data['total_users'] = User::count();
        $data['row'] = properties::where('status', '1')->latest()->take(24)->get();
        return view('backend.admin.dashboard.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
