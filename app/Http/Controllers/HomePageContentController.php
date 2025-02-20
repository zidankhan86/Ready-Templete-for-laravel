<?php

namespace App\Http\Controllers;

use App\Models\HomePageContent;
use Illuminate\Http\Request;

class HomePageContentController extends Controller
{
    public function index(){
        $data['title'] = 'Home Page Index';
        $data['content'] = HomePageContent::get();
        return view('backend.admin.home_page.index',$data);
    }


    public function edit(){
        $data['title'] = 'Home Page Edit';
        $data['item'] = HomePageContent::find(1);
        return view('backend.admin.home_page.edit',$data);
    }


    public function update(Request $request)
{
    $request->validate([
        // 'homepage_title' => 'required|string|max:255',
        // 'homepage_content' => 'required|string',
        // 'about_title' => 'required|string|max:255',
        // 'about_content' => 'required|string',
        // 'home_btn' => 'required|string|max:255',
        // 'about_btn' => 'required|string|max:255',
        // 'footer_title' => 'required|string|max:255',
        // 'footer_btn' => 'required|string|max:255',
    ]);

    $content = HomePageContent::find(1);
    if (!$content) {
        return redirect()->back()->with('error', 'Content not found.');
    }

    $content->update([
        'homepage_title' => $request->homepage_title,
        'homepage_content' => $request->homepage_content,
        'about_title' => $request->about_title,
        'about_content' => $request->about_content,
        'home_btn' => $request->home_btn,
        'about_btn' => $request->about_btn,
        'footer_title' => $request->footer_title,
        'footer_btn' => $request->footer_btn,
    ]);

    return redirect()->back()->with('success', 'Content updated successfully.');
}
}
