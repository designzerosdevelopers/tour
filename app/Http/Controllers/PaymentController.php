<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Inquiry;
use App\Mail\PaymentMail;
use App\Traits\CurrencyConverterTrait;

use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    use CurrencyConverterTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment');
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);
        try {
            Stripe::setApiKey('sk_test_51OmC8HArvCxUsgFQ95QRFQ3WRLPDJaFgDE2UxNGhIhWjb6H8E4Ocznx6ZsrdW70RDDfZClyf8szzhMOjvWP5t2Db00krvcyWTl');
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => $request->currency,
                            'product_data' => [
                                'name' => "tour packge",
                            ],
                            'unit_amount' => $request->amount  * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],

                'customer_email' => $request->email,
                'mode' => 'payment',
                'success_url' => $request->url . '?action=success',
                'cancel_url' => $request->url . '?action=fail',
            ]);


            $request['paid'] = true;
            $request['amount'] =  $this->getAEDCurrency($request->amount, $request->currency);
            Inquiry::create($request->all());

            Mail::to('example@example.com')->queue(new PaymentMail([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'url' => $request->url,
            ]));

            return redirect($session->url);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
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
