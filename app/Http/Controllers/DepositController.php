<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DepositController extends Controller
{
    public function index() {
        $deposits = Deposit::where('user_id', Auth::id())->get();
        return view('app.deposit', compact('deposits'));
    }

    public function stripeSession(Request $request)
    {
        if ($request->payment_method == "interac") {
            return redirect()->route('interac.create');
        }
        \Stripe\Stripe::setApiKey(config('stripe.sk'));        

        $url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data !== null) {
            $rates = $data['rates'];
        } else {
            Alert::error('Error', 'Something went wrong!');
            return back();
        }

        $productname = 'Deposit' . Auth::id();
        $totalprice = round($request->get('amount') / $rates[Auth::user()->currency]);
        $two0 = "00";
        $total = "$totalprice$two0";

        session()->put('amount', $total);

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'payment_method_types[]' => 'card',
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('dashboard'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        $deposit = new Deposit();
        $deposit->user_id = Auth::id();
        $deposit->amount = rmtwochar(session()->get('amount'));
        $deposit->payment_method = 'stripe';
        $deposit->save();

        session()->forget('amount');

        $user = User::find(Auth::id());
        $user->balance = $user->balance + $deposit->amount;
        $user->save();
        // Alert::success('Success', 'Deposit Successful!');
        return redirect('done');
    }
}
