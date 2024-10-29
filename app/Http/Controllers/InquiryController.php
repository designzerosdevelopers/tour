<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Tour;
use App\Models\Vehicle;
use App\Models\Inquiry;
use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use App\Traits\MailTrait;


class InquiryController extends Controller
{
    use MailTrait;
    public function send(Request $request)
    {


        $request->validate([
            'phone' => 'required',
            'name' => 'required|string',
            'email' => 'required|email',
        ]);

        $this->sendInquiryMail($request->all());
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
