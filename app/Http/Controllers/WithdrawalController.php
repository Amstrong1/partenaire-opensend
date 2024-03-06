<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdrawals = Withdrawal::where('user_id', Auth::id())->get();
        return view('app.history.withdrawal', compact('withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.withdrawal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());

        $url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data !== null) {
            $rates = $data['rates'];
        } else {
            Alert::error('Error', 'Something went wrong!');
            return back();
        }

        $amount = round($request->get('amount') / $rates[Auth::user()->currency]);

        if ($amount <= $user->balance) {
            $paymentTransaction = new Withdrawal();
            $paymentTransaction->user_id = Auth::id();
            $paymentTransaction->amount = $amount;
            $paymentTransaction->payment_method = $request->payment_method;
            $paymentTransaction->destination = $request->destination;
            $paymentTransaction->transfer_group = 'withdraw';
            $paymentTransaction->status = 'pending';
            $paymentTransaction->save();

            if ($request->payment_method !== 'interac') {
                $user->balance = $user->balance - $amount;
                $user->save();
            }

            if ($request->payment_method == 'interac') {
                $interac = new EloquentCollection();
                $interac->push([
                    'tel' => $request->tel,
                    'name' => $request->name,
                    'bank' => $request->bank,
                    'email' => $request->email,
                    'amount' => $request->amount,
                    'country' => $request->country,
                    'type' => $request->type,
                ]);
                $interac = $interac->collapse();
                return view('app.confirm-interac', compact('interac'));
            }

            return redirect('done');
        } else {
            Alert::error('error', 'Solde insuffisant');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Withdrawal $withdrawal)
    {
        //
    }
}
