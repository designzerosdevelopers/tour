<?php

namespace App\Http\Controllers;

use App\Models\PageSetting;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailer;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mymail(){
        
         $details = [
        'title' => 'Test Email from Laravel',
        'body' => 'This is a test email using your SMTP configuration.',
    ];

    $mail = Mail::raw($details['body'], function ($message) {
        $message->to('iftkhargabol@gmail.com')
                ->subject('Test Email');
    });
    if($mail){
        
        dd('Email sent successfully!') ;
    }
    else {
        dd("sdfsdf");
    }
    
    }
    public function index()
    {
        $page = request()->path();
        $pagedata = PageSetting::where('slug', $page)->firstOrFail();

        if ($page == '/') {
            $imageIds = json_decode($pagedata->image);


            if (empty($imageIds)) {
                return view('frontend.home');
            }

            $Homeimages =  Image::whereIn('id', $imageIds)
                ->select('id', 'path', 'file', 'alt')
                ->get();


            return view('frontend.home', ['Homeimages' => $Homeimages]);
        } else {
            return view('frontend.policy', ['pagedata' => $pagedata]);
        }
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
