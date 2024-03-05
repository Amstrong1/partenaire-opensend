<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UUIDController extends Controller
{
    public function print()
    {
        $user = User::find(Auth::id());
        $qrcode = QrCode::size(200)->generate($user->openid);

        // $pdf = PDF::loadView('app.user.print2', compact('user', 'qrcode'));
        // return $pdf->stream();
    }
}
