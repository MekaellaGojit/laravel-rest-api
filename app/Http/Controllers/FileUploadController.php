<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validate file
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Generate filename
        $filename = time() . '_' . uniqid() . '.' . $request->image->extension();

        // Store file in storage/app/public/uploads
        $request->image->storeAs('uploads', $filename, 'public');

        // Return public URL
        return response()->json([
            'message' => 'File uploaded successfully',
            'file_name' => $filename,
            'url' => asset('storage/uploads/' . $filename)
        ], 201);
    }
}
