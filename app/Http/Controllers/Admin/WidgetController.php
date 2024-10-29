<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Widget;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourIds = Widget::pluck('tour_id')->unique();
        
        $tours = Tour::whereIn('id', $tourIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('adminpanel.widget.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tourIds = Widget::pluck('tour_id')->unique();
        
        $tours = Tour::whereNotIn('id', $tourIds)
            ->orderBy('id', 'desc')->get();

        return view('adminpanel.widget.create', ['tours' =>  $tours]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'tour_id' => 'required|exists:tours,id', // Optional: validate tour_id
            'title' => 'required|array|size:4',
            'title.*' => 'required|string|max:255', // Each title must be a string
            'description' => 'required|array|size:4',
            'description.*' => 'required|string', // Each description must be a string
            'images' => 'required|array|size:4',
            'images.*' => 'required|exists:images,id', // Each image must exist in the images table
        ]);

        // Loop through each entry and create a Widget
        foreach ($request->title as $index => $title) {
            Widget::create([
                'tour_id' => $request->tour_id,
                'title' => $title,
                'description' => $request->description[$index],
                'image_id' => $request->images[$index]
            ]);
        }

        return redirect()->route('widget.index')->with('success', 'Widget added successfully!');
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
        
        $widgets = Widget::where('tour_id', $id)->with('image')->get();

       
        return view('adminpanel.widget.edit', ['widgets'=>$widgets]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|array|size:4',
            'title.*' => 'required|string|max:255', // Each title must be a string
            'description' => 'required|array|size:4',
            'description.*' => 'required|string', // Each description must be a string
            'images' => 'required|array|size:4',
            'images.*' => 'required|exists:images,id', // Each image must exist in the images table
        ]);
    
        // Fetch the existing widgets by the tour_id
        $widgets = Widget::where('tour_id', $id)->get();
    
        // Loop through each widget and update it
        foreach ($widgets as $index => $widget) {
            $widget->update([
                'title' => $request->title[$index],
                'description' => $request->description[$index],
                'image_id' => $request->images[$index],
            ]);
        }
    
        return redirect()->route('widget.index')->with('success', 'Widget updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Widget::where('tour_id', $id)->delete();

        return redirect()->route('widget.index')->with('success', 'Widget deleted successfully!');
    }
}
