<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $inquiries = Inquiry::whereBetween('created_at', [
            now()->subDays(30),
            now()
        ])->get();

        $paidInquiries = $inquiries->where('paid', 1);
        $unpaidInquiriesCount = $inquiries->where('paid', 0)->count();

        $totalAmount = $paidInquiries->sum('amount');

        $booking = [
            'totalAmount' => $totalAmount,
            'paid' => $paidInquiries->count(),
            'unpaid' => $unpaidInquiriesCount,
        ];

        $inquiries = Inquiry::orderBy('id', 'desc')->paginate(10);
        return view('adminpanel.index', compact('booking', 'inquiries'));
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
    public function show(string $id)
    {
        //
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
