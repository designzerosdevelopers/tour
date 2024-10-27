<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metadata;
use App\Models\PageSetting;
use App\Models\Image;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageseo = PageSetting::get();
        return view('adminpanel.setting.pageseo.index', ['pageseo' => $pageseo]);
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
        $key = $request->keys()[1];

        $setting = PageSetting::where('name', $key)->first();

        if ($setting) {

            $setting->value = $request->input($key);
            $setting->save();
        } else {
            abort(404, 'Setting not found');
        }

        return redirect()->route('setting.index')->with('success', 'Saved');
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
        // Find the page setting by ID
        $meta = PageSetting::find($id);

        // Decode the image field if it's JSON encoded (assumed to be an array of image IDs)
        $meta->image = json_decode($meta->image, true);  // true to get an associative array

        // Fetch the images only if image is not null or empty
        $images = [];
        if (!empty($meta->image)) {
            $images = Image::whereIn('id', $meta->image)->get();
        }

        // Decode the qna field if it's JSON encoded
        $meta->qna = json_decode($meta->qna, true);  // true to get an associative array

       

        // Pass the 'meta' and 'images' to the view
        return view('adminpanel.setting.pageseo.edit', ['meta' => $meta, 'images' => $images]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Step 1: Handle QnA (questions and answers)
        $qna = [];
        foreach ($request['question'] as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $request['answer'][$index] ?? '',
            ];
        }
    
        // Encode the QnA array to JSON format
        $request['qna'] = json_encode($qna);
    
        // Step 2: Handle Image Names
        // Retrieve the existing PageSetting entry by ID
        $metadata = PageSetting::find($id);
        
        // Initialize the images array
        $existingImages = [];
    
        if ($metadata) {
            // Decode existing images from JSON format
            $existingImages = json_decode($metadata->image, true) ?? [];
        }
    
        // Check if the 'images' key exists and is an array
        if (isset($request->images) && is_array($request->images)) {
            // Merge existing images with new images
            $mergedImages = array_merge($existingImages, $request->images);
        } else {
            // If no new images, keep the existing ones
            $mergedImages = $existingImages;
        }
    
        // Convert the merged images array to JSON format
        $request['image'] = json_encode($mergedImages);
    
        // Step 3: Update the PageSetting entry with the new data
        if ($metadata) {
            // Update the database record with all the request data
            $metadata->update($request->all());
        }
    
        // Redirect to the settings index page with a success message
        return redirect()->route('setting.index')->with('success', 'Saved');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function deleteImage(string $page_id, $image_id)
    {
        // Find the page by its ID
        $page = PageSetting::find($page_id);
        
        // Get the images array
        $images = json_decode($page['image']);
    
        // Delete the image_id from the images array
        $newImages = array_diff($images, [$image_id]);
    
        // Check if the images have been modified
        if (count($newImages) < count($images)) {
            // Update the page's images
            $page['image'] = array_values($newImages); // Reindex the array
            $page->save(); // Save the changes to the database
    
            return response()->json(['success' => 'Image deleted successfully', 'images' => $page['image']], 200);
        } else {
            return response()->json(['error' => 'Image not found'], 404);
        }
    }
    
    
}
