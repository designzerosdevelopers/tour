<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleAttribute;
use Illuminate\Support\Str;
use App\Models\Metadata;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use App\Models\VehicleImage;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $vehicles = Vehicle::with(['metadata', 'vehicle_attributes'])->orderBy('created_at', 'desc')->paginate(10);

        return view('adminpanel.vehicle.vehicle_post.index', ['posts' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.vehicle.vehicle_post.create', ['vehicles' => VehicleAttribute::all()]);
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
                'location' => 'required|string',
                'status' => 'nullable|string',
                'description' => 'required|string',
                'price' => 'required',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpg,jpeg,png|max:2000',
                'vehicle_id' => 'required',
                'value.*' => 'nullable|string|max:500',
                'question.*' => 'nullable|string|max:2000',
                'answer.*' => 'nullable|string|max:5000',
            ],
            [
                'vehicle_id.required' => 'Please select a vehicle.',
            ]
        );

        $model_type = 'App\\Models\\Vehicle';
        $questions = $validatedData['question'] ?? [];
        $answers = $validatedData['answer'] ?? [];

        $qna = [];
        foreach ($questions as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $answers[$index] ?? ''
            ];
        }

        $validatedData['more_fields'] = json_encode([
            'values' => $validatedData['value'] ?? [],
            'qna' => $qna
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $Vehicle = Vehicle::create($validatedData);

        if ($request->images) {
            foreach ($request->images as $imageID) {
                VehicleImage::create([
                    'vehicle_id' => $Vehicle->id,
                    'image_id' => $imageID,
                ]);
            }
        }

        $validatedData['model_id'] = $Vehicle->id;
        $validatedData['model_type'] = $model_type;
        Metadata::create($validatedData);
        return redirect()->route('vehicle.index')->with('success', 'Saved successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $vehicle = vehicle::find($id);
        if (!$vehicle) {
            return abort(404, 'vehicle not found');
        }

        return view('adminpanel.vehicle.show', ['vehicle' => $vehicle]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehicle = Vehicle::with('images')->find($id);

        if (!$vehicle) {
            return abort(404, 'Vehicle not found');
        }
        $vehicle->more_fields = json_decode($vehicle->more_fields);
        $meta = Metadata::where('model_type', 'App\Models\Vehicle')->where('model_id', $id)->first();

        if (!$vehicle) {
            return abort(404, 'Vehicle not found');
        }

        return view('adminpanel.vehicle.vehicle_post.edit', ['vehicle_post' => $vehicle, 'meta' => $meta, 'vehicle_list' => VehicleAttribute::all()]);
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
                'location' => 'required|string',
                'status' => 'nullable|string',
                'description' => 'required|string',
                'price' => 'required',
                'image' => 'nullable',
                'image.*' => 'image|mimes:jpg,jpeg,png|max:2000',
                'vehicle_id' => 'required',
                'value.*' => 'nullable|string|max:500',
                'question.*' => 'nullable|string|max:2000',
                'answer.*' => 'nullable|string|max:5000',

            ],
            [
                'vehicle_id.required' => 'Please select a vehicle.',
            ]
        );

        $model_type = 'App\Models\Vehicle';
        $questions = $validatedData['question'] ?? [];
        $answers = $validatedData['answer'] ?? [];

        $qna = [];
        foreach ($questions as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $answers[$index] ?? ''
            ];
        }

        $validatedData['more_fields'] = json_encode([
            'values' => $validatedData['value'] ?? [],
            'qna' => $qna
        ]);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        Vehicle::find($id)->update($validatedData);

        Metadata::where('model_id', $id)->where('model_type', $model_type)->first()->update($validatedData);

        if ($request->images) {
            foreach ($request->images as $imageID) {
                VehicleImage::create([
                    'vehicle_id' => $id,
                    'image_id' => $imageID,
                ]);
            }
        }

        return redirect()->route('vehicle.index')->with('success', 'Saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model_type = 'App\Models\Vehicle';

        $Vehicle = Vehicle::find($id);
        if (!$Vehicle) {
            return false;
        }

        Metadata::where('model_type', $model_type)->where('model_id', $id)->delete();

        $Images = VehicleImage::where('vehicle_id', $id)->get();
        foreach ($Images as $Image) {
            $Image->delete();
        }

        $Vehicle->delete();

        return redirect()->route('vehicle.index')->with('success', 'Deleted successfully!');
    }

    public function deleteImage($vehicle_post_id, $image_id)
    {
        $image = VehicleImage::where('image_id', $image_id)
            ->where('vehicle_id', $vehicle_post_id)
            ->firstOrFail();

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
