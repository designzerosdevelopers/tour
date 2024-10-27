<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Attraction;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Traits\CurrencyConverterTrait;



class DestinationController extends Controller
{
    use CurrencyConverterTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::where('status', 1)
        ->with('image', 'tours', 'activities')
        ->get();

        return view('frontend.destination.list', compact('destinations'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $destination = Destination::with(['country', 'image', 'tours','activities'])->where('slug', $slug)->firstOrFail();
        $destination->qna = json_decode($destination->qna);
        foreach ($destination->tours as $tour) {
            $tour->adult_price = $this->arrayFormatCurrency($tour->adult_price);
        }
        foreach ($destination->activities as $activity) {
            $activity->adult_price = $this->arrayFormatCurrency($activity->adult_price);
        }
        return view('frontend.destination.detail', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
