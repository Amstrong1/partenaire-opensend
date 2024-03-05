<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UUIDController extends Controller
{
    public function show() {
        $user = User::find(Auth::id());
        $qrcode = QrCode::size(200)->generate($user->openid);
        return view('app.uuid', compact('qrcode')); 
    }
    public function print()
    {
        $user = User::find(Auth::id());
        $qrcode = QrCode::size(200)->generate($user->openid);

        $pdf = PDF::loadView('app.print_uuid', compact('user', 'qrcode'));
        return $pdf->stream();
    }
}
