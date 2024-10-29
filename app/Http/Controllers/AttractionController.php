<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Traits\CurrencyConverterTrait;

class AttractionController extends Controller
{

    use CurrencyConverterTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attractions = Attraction::with('images')
        ->withCount(['tours', 'activities'])
        ->get();
    
        

        return view('frontend.attraction.list', ['attractions' => $attractions]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create() {}

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
        $attraction = Attraction::with(['country', 'images', 'tours','activities'])->where('slug', $slug)->firstOrFail();
        $attraction->qna = json_decode($attraction->qna);
        foreach ($attraction->tours as $tour) {
            $tour->adult_price = $this->arrayFormatCurrency($tour->adult_price);
        }
        foreach ($attraction->activities as $activity) {
            $activity->adult_price = $this->arrayFormatCurrency($activity->adult_price);
        }
        return view('frontend.attraction.detail', ['attraction' => $attraction]);
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
