<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|mimes:pdf,jpg,png|max:2048', // Adjust allowed file types and size
        ]);

        // Store the file
        $filePath = $request->file('file')->store('uploads', 'public');

        // Save the content details to the database
        $content = new Content();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->file_path = $filePath;
        $content->user_id = Auth::user()->id;
        $content->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Content uploaded successfully!');
    }
}
