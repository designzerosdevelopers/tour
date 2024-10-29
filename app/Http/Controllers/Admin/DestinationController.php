<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Symfony\Contracts\Service\Attribute\Required;

class DestinationController extends Controller
{
    /**
     * Display a listing of the destinations.
     * */
    public function index()
    {
        $destinations = Destination::paginate(5);
        return view('adminpanel.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new destination.
     *
     */
    public function create()
    {
        $countries = Country::all();

        return view('adminpanel.destinations.create', compact('countries'));
    }

    /**
     * Store a newly created destination in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required',
            'country_id' => 'required',
            'description' => 'required|string',
            'meta_tite' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'images' => 'Required',
            'question.*' => 'nullable|string|max:2000',
            'answer.*' => 'nullable|string|max:5000',
        ]);

        $qna = [];
        foreach ($request['question'] as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $request['answer'][$index] ?? ''
            ];
        }

        $data = $request->all();
        $data['qna'] = json_encode($qna);
        $data['slug'] = Str::slug($data['title'], '-');
        $data['featured_image'] = $request->input('images');

        $destination =  Destination::create($data);
        $data['model_type'] = 'App\Models\Destination';
        $data['model_id'] = $destination->id;
        Metadata::create($data);

        return redirect()->route('destination.index')
            ->with('success', 'Destination created successfully.');
    }

    /**
     * Display the specified destination.
     * @param  \App\Models\Destination  $destination
     */
    public function show(Destination $destination)
    {
        return view('adminpanel.destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified destination.
     *
     * @param  \App\Models\Destination  $destination
     */
    public function edit(Destination $destination)
    {
        $countries = Country::all();
        $destination = Destination::with('image')->find($destination->id);
        $destination->qna = json_decode($destination->qna);

        $meta = Metadata::where('model_type', 'App\Models\Destination')->where('model_id', $destination->id)->first();

        return view('adminpanel.destinations.edit', compact('destination', 'countries', 'meta'));
    }

    /**
     * Update the specified destination in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|boolean',
            'country_id' => 'required|integer',
            'description' => 'required|string',
            'meta_tite' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'question.*' => 'nullable|string|max:2000',
            'answer.*' => 'nullable|string|max:5000',
        ]);

        // Get all the request data
        $data = $request->all();

        // Check if 'images' is provided in the request
        if ($request->has('images')) {
            $data['featured_image'] = $request->input('images');
        }

        $qna = [];
        foreach ($request['question'] as $index => $question) {
            $qna[] = [
                'question' => $question,
                'answer' => $request['answer'][$index] ?? ''
            ];
        }
        $data['slug'] = Str::slug($data['title'], '-');

        $data['qna'] = json_encode($qna);

        $destination->update($data);

        Metadata::where('model_type', 'App\Models\Destination')->where('model_id', $destination->id)->update([
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        // Redirect back to the destination index page with a success message
        return redirect()->route('destination.index')
            ->with('success', 'Destination updated successfully.');
    }


    /**
     * Remove the specified destination from the database.
     *
     * @param  \App\Models\Destination  $destination
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('destination.index')
            ->with('success', 'Destination deleted successfully.');
    }
}
