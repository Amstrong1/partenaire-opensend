<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
