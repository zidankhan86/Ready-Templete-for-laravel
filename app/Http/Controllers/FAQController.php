<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(){

        $data['faqs'] = FAQ::all();
        return view('backend.admin.faq.index',$data);
    }

    public function create()
    {
        return view('backend.admin.faq.create'); // Create form
    }

    // Store new FAQ
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->slug = Str::slug($request->question);
        $faq->save();

        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    // Show edit form
    public function edit($slug)
    {
        $faq = FAQ::where('slug', $slug)->first();
        return view('backend.admin.faq.create', compact('faq'));
    }

    public function show($slug)
    {
        $faq = FAQ::where('slug', $slug)->first();
        return view('backend.admin.faq.show', compact('faq'));
    }
    // Update FAQ
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
        'status' => 'required|boolean',
    ]);

    // Find the FAQ by ID
    $faq = FAQ::findOrFail($id);

    // Manually update the properties
    $faq->question = $request->question;
    $faq->answer = $request->answer;
    $faq->status = $request->status;

    // Save the updated FAQ
    $faq->save();

    // Redirect with a success message
    return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
}

    // Delete FAQ
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }

}
