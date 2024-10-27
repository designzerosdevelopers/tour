<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Attraction;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\Widget;
use Illuminate\Http\Request;
use App\Traits\CurrencyConverterTrait;
use Illuminate\Support\Facades\Session;


class TourController extends Controller
{
    use CurrencyConverterTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.tours.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    public function store(Request $request)
    {
        $query = Tour::with('images');
        $currency = Session::get('currency', 'AED');

        if (!empty($request->priceRange)) {
            $priceRange =  $request->priceRange;
            $response = $this->currencyAPI();
            if ($response['result'] === 'success') {
                $priceRange = [
                    $request->priceRange[0] / $response['conversion_rates'][$currency],
                    $request->priceRange[1] / $response['conversion_rates'][$currency]
                ];
            }
            $query->whereBetween('adult_price', $priceRange);
        }

        if (!empty($request->topfilter)) {
            if ($request->topfilter == 'high-low') {
                $query->orderBy('adult_price', 'desc');
            } elseif ($request->topfilter == 'low-high') {
                $query->orderBy('adult_price', 'asc');
            } elseif ($request->topfilter == 'recently-added') {
                $query->orderBy('created_at', 'desc');
            }
        }


        $perPage = 10;
        $page = $request->input('page', 1);
        $tours = $query->paginate($perPage, ['*'], 'page', $page);

        foreach ($tours as $tour) {
            $tour->adult_price = $this->arrayFormatCurrency($tour->adult_price);
        }

        $data = [
            'tours' => $tours->items(),
            'destinations' => Destination::get(),
            'attractions' => Attraction::get(),
            'activities' => Activity::get(),
            'pagination' => [
                'currentPage' => $tours->currentPage(),
                'lastPage' => $tours->lastPage(),
                'perPage' => $tours->perPage(),
                'total' => $tours->total(),
            ],
            'status' => 'success',
        ];

        return response()->json($data);
    }


    public function show(string $slug)
    {

        $tour = Tour::where('slug', $slug)->with('metadata', 'images')->firstOrFail();
        $tour->adult_price = $this->formatCurrency($tour->adult_price);
        $tour->child_price = $this->formatCurrency($tour->child_price);
        $tour->private_transport_extra_cost = $this->formatCurrency($tour->private_transport_extra_cost);
        $tour->qna = json_decode($tour->qna);

        $widgets = Widget::where('tour_id', $tour->id)->with('image')->get();
        return view('frontend.tours.detail', [
            'tour' => $tour,
            'metadata' => $tour->metadata,
            'widgets' => $widgets
        ]);
    }
}
