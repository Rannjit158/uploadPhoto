<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index()
    {
        $photos = Photo::latest()->get();
        return view('upload.index', compact('photos'));
    }

    public function create()
    {
        return view('upload.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $path = $request->file('photo')->store('uploads', 'public');

        Photo::create(['filename' => $path]);

        return redirect()->route('upload.index')->with('success', 'Photo uploaded successfully!');
    }

    public function edit(Photo $upload)
    {
        return view('upload.edit', compact('upload'));
    }

    public function update(Request $request, Photo $upload)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // delete old file
            Storage::disk('public')->delete($upload->filename);

            $path = $request->file('photo')->store('uploads', 'public');
            $upload->update(['filename' => $path]);
        }

        return redirect()->route('upload.index')->with('success', 'Photo updated successfully!');
    }

    public function destroy(Photo $upload)
    {
        Storage::disk('public')->delete($upload->filename);
        $upload->delete();

        return redirect()->route('upload.index')->with('success', 'Photo deleted successfully!');
    }
}
