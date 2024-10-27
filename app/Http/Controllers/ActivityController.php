<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Traits\CurrencyConverterTrait;

class ActivityController extends Controller
{
    use CurrencyConverterTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('frontend.activity.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}
    public function store(Request $request)
    {
        $query = Activity::with('images');

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
        $activities = $query->paginate($perPage, ['*'], 'page', $page);

        foreach ($activities as $activity) {
            $activity->adult_price = $this->arrayFormatCurrency($activity->adult_price);
        }

        $data = [
            'activities' => $activities->items(),
            'pagination' => [
                'currentPage' => $activities->currentPage(),
                'lastPage' => $activities->lastPage(),
                'perPage' => $activities->perPage(),
                'total' => $activities->total(),
            ],
            'status' => 'success',
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $activity = Activity::where('slug', $slug)->with('metadata', 'images')->firstOrFail();
        $activity->adult_price = $this->formatCurrency($activity->adult_price);
        $activity->child_price = $this->formatCurrency($activity->child_price);
        $activity->private_transport_extra_cost = $this->formatCurrency($activity->private_transport_extra_cost);
        $activity->qna = json_decode($activity->qna);
        return view('frontend.activity.detail', ['activity' => $activity, 'metadata' => $activity->metadata]);
    }
}
