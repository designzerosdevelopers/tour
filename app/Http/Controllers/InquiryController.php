<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\InquiryMail;
use App\Models\Activity;
use App\Models\Tour;
use App\Models\Vehicle;
use App\Models\Inquiry;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $data = $request->all();

        Mail::to('example@example.com')->queue(new InquiryMail($data));
        Inquiry::create($request->all());
        return response()->json(['success' => 'Email queued successfully']);
    }

    public function homeSearch(Request $request)
    {

        if ($request->category == 'tours') {
            $query = Tour::query();
        } elseif ($request->category == 'activities' || $request->category == 'tickets') {
            $query = Activity::query();
        } elseif ($request->category == 'rentals') {
            $query = Vehicle::query();
        }
        $data = $query->where('title', 'LIKE', '%' . $request->search . '%')->take(6)->get();
        return response()->json($data);
    }

    public function tourSearch(Request $request)
    {
        $data = Tour::where('title', 'LIKE', '%' . $request->search . '%')->take(6)->get();
        return response()->json($data);
    }

    public function changeCurrency(Request $request)
    {
        session(['currency' => $request->currency]);
        return redirect()->back();
    }
    public function subscriptionStore(Request $request)
    {
        Subscription::create($request->all());
        return response()->json('success');

    }
}
