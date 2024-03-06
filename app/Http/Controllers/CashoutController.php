<?php

namespace App\Http\Controllers;

use App\Models\Cashout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
