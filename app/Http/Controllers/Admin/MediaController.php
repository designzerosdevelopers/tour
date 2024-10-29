<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityImage;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\PostImage;
use App\Models\TourImage;
use App\Models\VehicleImage;
use App\Models\AttractionImage;
use Illuminate\Support\Str;


class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminpanel.media.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $search = $request->input('search');

        $images = Image::when($search, function ($query, $search) {
            $query->where('alt', 'like', "%{$search}%");
        })->orderBy('id', 'desc')->get();
        return response()->json($images);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $directory = 'assets/imgs/page/';

        $images =  $request->file('images');
        foreach ($images as $image) {
            $imageSize = round($image->getSize() / 1024) . "kb";

            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($directory), $imageName);

            $imagePath = public_path($directory . $imageName);
            list($width, $height) = getimagesize($imagePath);
            $resolution = $width . 'x' . $height;


            Image::create([
                'path' => $directory,
                'file' => $imageName,
                'alt' => pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME),
                'size' => $imageSize,
                'resolution' => $resolution,
            ]);
        }
        return response()->json(['success' => 'Images uploaded successfully']);
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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'alt' => 'required|string|max:255',
        ]);

        // Find the media item by ID or fail
        $media = Image::findOrFail($id);

        // Update the media item with validated data
        $media->update([
            'alt' => $validated['alt']
        ]);

        // Return a JSON response
        return response()->json([
            'message' => 'Image details updated successfully!',
            'media' => $media
        ], 200);
    }


    public function destroy(string $id)
    {

        $image = Image::findOrFail($id);
        VehicleImage::where('image_id', $id)->delete();
        AttractionImage::where('image_id', $id)->delete();
        ActivityImage::where('image_id', $id)->delete();
        PostImage::where('image_id', $id)->delete();
        TourImage::where('image_id', $id)->delete();

        $filePath = public_path($image->path . $image->file);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
