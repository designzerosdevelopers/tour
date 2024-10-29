<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\Activity;
use App\Models\Metadata;
use App\Models\ActivityImage;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at', 'desc')->paginate(10);
        return view('adminpanel.activity.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activityTimes = [
            '12:00 AM',
            '01:00 AM',
            '02:00 AM',
            '03:00 AM',
            '04:00 AM',
            '05:00 AM',
            '06:00 AM',
            '07:00 AM',
            '08:00 AM',
            '09:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '01:00 PM',
            '02:00 PM',
            '03:00 PM',
            '04:00 PM',
            '05:00 PM',
            '06:00 PM',
            '07:00 PM',
            '08:00 PM',
            '09:00 PM',
            '10:00 PM',
            '11:00 PM'
        ];

        $attractions = Attraction::get();
        $destinations = Destination::get();

        return view('adminpanel.activity.create', compact([
            'activityTimes',
            'attractions',
            'destinations'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'activity_type' => 'required',
            'child_price' => 'required',
            'adult_price' => 'required',
            'location' => 'required',
            'public_activity_timings'=>'required',
            'private_transport_extra_cost' => 'required',
            'attraction_id' => 'nullable',
            'destination_id' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'question.*' => 'nullable|string|max:2000',
            'answer.*' => 'nullable|string|max:5000',
        ]);

        $qna = [];

        if (!empty($validatedData['question'])) {
            foreach ($validatedData['question'] as $index => $question) {
                if (!empty($question) || !empty($validatedData['answer'][$index])) {
                    $qna[] = [
                        'question' => $question,
                        'answer' => $validatedData['answer'][$index] ?? ''
                    ];
                }
            }
        }

        $validatedData['qna'] = !empty($qna) ? json_encode($qna) : null;
        $validatedData['no_of_people'] = $request->no_of_people;
        $validatedData['duration'] = $request->duration;
        $validatedData['activity_transport'] = $request->activity_transport;
        $validatedData['activity_type'] = $request->activity_type;
        $validatedData['attraction_id'] = $request->attraction_id;
        $validatedData['destination_id'] = $request->destination_id;
        $validatedData['location'] = $request->location;
        $validatedData['other_info'] = $request->other_info;
        $validatedData['languages'] = json_encode($request->languages);
        $validatedData['includes'] =  json_encode($request->includes);
        $validatedData['excludes'] =  json_encode($request->excludes);
        $validatedData['public_activity_timings'] = json_encode($request->public_activity_timings);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        $activity = Activity::create($validatedData);

        $validatedData['model_id'] = $activity->id;
        $validatedData['model_type'] = 'App\Models\Activity';
        Metadata::create($validatedData);

        if ($request->images) {
            foreach ($request->images as $imageID) {
                ActivityImage::create([
                    'activity_id' => $activity->id,
                    'image_id' => $imageID,
                ]);
            }
        }

        return redirect()->route('activity.index')->with('success', 'Activity added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::with('images')->findOrFail($id);
        return view('frontend.activity.detail', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activityTimes = [
            '12:00 AM',
            '01:00 AM',
            '02:00 AM',
            '03:00 AM',
            '04:00 AM',
            '05:00 AM',
            '06:00 AM',
            '07:00 AM',
            '08:00 AM',
            '09:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM',
            '01:00 PM',
            '02:00 PM',
            '03:00 PM',
            '04:00 PM',
            '05:00 PM',
            '06:00 PM',
            '07:00 PM',
            '08:00 PM',
            '09:00 PM',
            '10:00 PM',
            '11:00 PM'
        ];
        $activity = Activity::with('images', 'metadata')->findOrFail($id);
        $activity->qna = json_decode($activity->qna);

        return view('adminpanel.activity.edit',  [
            'activity' => $activity,
            'meta' => $activity->metadata,
            'attractions_list' => Attraction::get(),
            'destinations_list' => Destination::get(),
            'activityTimes' =>$activityTimes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required',
            'activity_type' => 'required',
            'description' => 'required',
            'child_price' => 'required',
            'adult_price' => 'required',
            'attraction_id' => 'nullable',
            'destination_id' => 'nullable',
            'location' => 'required',
            'public_activity_timings'=>'required',
            'meta_title' => 'nullable',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',
            'question.*' => 'nullable|string|max:2000',
            'answer.*' => 'nullable|string|max:5000',
        ]);

        $qna = [];

        if (!empty($validatedData['question'])) {
            foreach ($validatedData['question'] as $index => $question) {
                if (!empty($question) || !empty($validatedData['answer'][$index])) {
                    $qna[] = [
                        'question' => $question,
                        'answer' => $validatedData['answer'][$index] ?? ''
                    ];
                }
            }
        }

        $validatedData['qna'] = !empty($qna) ? json_encode($qna) : null;
        $validatedData['no_of_people'] = $request->no_of_people;
        $validatedData['duration'] = $request->duration;
        $validatedData['activity_transport'] = $request->activity_transport;
        $validatedData['activity_type'] = $request->activity_type;
        $validatedData['location'] = $request->location;
        $validatedData['attraction_id'] = $request->attraction_id;
        $validatedData['destination_id'] = $request->destination_id;
        $validatedData['other_info'] = $request->other_info;
        $validatedData['languages'] = json_encode($request->languages);
        $validatedData['includes'] = json_encode($request->includes);
        $validatedData['excludes'] = json_encode($request->excludes);
        $validatedData['public_activity_timings'] = json_encode($request->public_activity_timings);

        $validatedData['slug'] = Str::slug($validatedData['title'], '-');

        Activity::findOrFail($id)->update($validatedData);
        Metadata::where('model_type', 'App\Models\Activity')->where('model_id', $id)->update([
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        if ($request->images) {
            foreach ($request->images as $imageID) {
                ActivityImage::create([
                    'activity_id' => $id,
                    'image_id' => $imageID,
                ]);
            }
        }


        // Redirecting with a success message
        return redirect()->route('activity.index')->with('success', 'Activity updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model_type = 'App\Models\Activity';

        $activity = Activity::find($id);
        if (!$activity) {
            return false;
        }

        Metadata::where('model_type', $model_type)->where('model_id', $id)->delete();

        $Images = ActivityImage::where('activity_id', $id)->get();
        foreach ($Images as $Image) {
            $Image->delete();
        }

        $activity->delete();

        return redirect()->route('activity.index')
            ->with('success', 'Item deleted successfully.');
    }

    public function deleteImage($activity_id, $image_id)
    {
        $image = ActivityImage::where('image_id', $image_id)
            ->where('activity_id', $activity_id)
            ->firstOrFail();

        $image->delete();

        return response()->json(['message' => 'Image deleted successfully.']);
    }
}
