<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Metadata;
use App\Models\AttractionImage;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Attractions =   Attraction::orderBy('created_at', 'desc')->paginate(10);

        return view('adminpanel.attraction.index', ['attractions' => $Attractions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.attraction.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate(
            [
                'meta_title' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'title' => 'required|string',
                'description' => 'nullable|string',
                'status' => 'nullable|string',
                'published' => 'boolean',
            ]
        );


        $validatedData['user_id'] = 0;
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $Attraction = Attraction::create($validatedData);
        if ($request->images) {
            foreach ($request->images as $imageID) {
                AttractionImage::create([
                    'attraction_id' => $Attraction->id,
                    'image_id' => $imageID,
                ]);
            }
        }

        $validatedData['model_type'] = 'App\Models\Attraction';
        $validatedData['model_id'] = $Attraction->id;
        Metadata::create($validatedData);
        return redirect()->route('attraction.index')->with('success', 'Attraction created successfully!');
    }


    public function edit(string $id)
    {
        $Attraction = Attraction::with('images')->find($id);

        if (!$Attraction) {
            return abort(404, 'Attraction not found');
        }
        $Attraction->qna = json_decode($Attraction->qna);

        $meta = Metadata::where('model_type', 'App\Models\Attraction')->where('model_id', $id)->first();

        return view('adminpanel.attraction.edit', ['attraction' => $Attraction, 'meta' => $meta, 'categories' => Category::all()]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validatedData = $request->validate(
            [
                'meta_title' => 'nullable',
                'meta_keyword' => 'nullable',
                'meta_description' => 'nullable',
                'title' => 'required|string',
                'description' => 'nullable|string',
                'status' => 'nullable|string',
                'published' => 'boolean',
            ]
        );


        $Attraction = Attraction::findOrFail($id);

        if ($request->images) {
            foreach ($request->images as $imageID) {
                AttractionImage::create([
                    'attraction_id' => $id,
                    'image_id' => $imageID,
                ]);
            }
        }

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $Attraction->update($validatedData);
        Metadata::where('model_type', 'App\Models\Attraction')->where('model_id', $id)->update([
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);

        return redirect()->route('attraction.index')->with('success', 'Attraction saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $model_type = 'App\Models\Attraction';
        $Attraction = Attraction::find($id);
        if (!$Attraction) {
            return false;
        }

        Metadata::where('model_type', $model_type)->where('model_id', $id)->delete();

        $Images = AttractionImage::where('attraction_id', $id)->get();
        foreach ($Images as $Image) {
            $Image->delete();
        }

        $Attraction->delete();
        return redirect()->route('attraction.index')->with('success', 'Attraction deleted successfully!');
    }

    public function deleteImage($Attraction_id, $image_id)
    {
        $image = AttractionImage::where('image_id', $image_id)
            ->where('attraction_id', $Attraction_id)
            ->firstOrFail();

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
