<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cashout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CashoutRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CashoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cashouts = Cashout::where('user_id', Auth::id())->get();
        return view('app.history.transfert', compact('cashouts'));
    }

    public function create()
    {
        return view('app.transfert');
    }

    public function store(CashoutRequest $request)
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
            $receiver = User::where('openid', $request->uuid)->first();
            if ($receiver !== null) {
                $transfert = new EloquentCollection();
                $transfert->push([
                    'amount' => $amount,
                    'uuid' => $request->uuid,
                    'motif' => $request->motif,
                    'receiver' => $receiver->name
                ]);
                $transfert = $transfert->collapse();
                return view('app.confirm-transfert', compact('transfert'));
            } else {
                Alert::error('error', 'Destinataire introuvable');
                return back();
            }
        } else {
            Alert::error('error', 'Solde insuffisant');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cashout $cashout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashout $cashout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cashout $cashout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashout $cashout)
    {
        //
    }
}
