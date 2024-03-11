<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        if (app()->getLocale() == 'fr') {
            $pays = [
                // 'Africa' => [
                //     'Benin' => 'Benin',
                //     'Burkina Faso' => 'Burkina Faso',
                //     'Cape Verde' => 'Cape Verde',
                //     'Côte d\'Ivoire' => 'Côte d\'Ivoire',
                //     'Gambia' => 'Gambia',
                //     'Ghana' => 'Ghana',
                //     'Guinea' => 'Guinea',
                //     'Guinea-Bissau' => 'Guinea-Bissau',
                //     'Liberia' => 'Liberia',
                //     'Mali' => 'Mali',
                //     'Mauritania' => 'Mauritania',
                //     'Niger' => 'Niger',
                //     'Nigeria' => 'Nigeria',
                //     'Senegal' => 'Senegal',
                //     'Sierra Leone' => 'Sierra Leone',
                //     'Togo' => 'Togo',
                // ],

                'Amérique' => [
                    'Canada' => 'Canada',
                    'États-Unis d\'Amérique' => 'États-Unis d\'Amérique',
                    'Haïti' => 'Haïti',
                    'Mexique' => 'Mexique',
                ],

                'Europe' => [
                    'Allemagne' => 'Allemagne',
                    'Autriche' => 'Autriche',
                    'Belgique' => 'Belgique',
                    'Chypre' => 'Chypre',
                    'Espagne' => 'Espagne',
                    'France' => 'France',
                    'Grèce' => 'Grèce',
                    'Norvège' => 'Norvège',
                    'Pologne' => 'Pologne',
                    'Portugal' => 'Portugal',
                    'Royaume-Uni' => 'Royaume-Uni',
                    'Russie' => 'Russie',
                    'Suède' => 'Suède',
                    'Suisse' => 'Suisse',
                    'Turquie' => 'Turquie',
                ],

            ];
        } else {
            $pays = [
                "America" => [
                    "Canada" => "Canada",
                    "United States of America" => "United States of America",
                    "Haiti" => "Haiti",
                    "Mexico" => "Mexico"
                ],
                "Europe" => [
                    "Germany" => "Germany",
                    "Austria" => "Austria",
                    "Belgium" => "Belgium",
                    "Cyprus" => "Cyprus",
                    "Spain" => "Spain",
                    "France" => "France",
                    "Greece" => "Greece",
                    "Norway" => "Norway",
                    "Poland" => "Poland",
                    "Portugal" => "Portugal",
                    "United Kingdom" => "United Kingdom",
                    "Russia" => "Russia",
                    "Sweden" => "Sweden",
                    "Switzerland" => "Switzerland",
                    "Turkey" => "Turkey"
                ]
            ];
        }

        return view('auth.register', ['pays' => $pays]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'tel' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cid' => ['required', 'image', 'max:5000'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $fileName = time() . '.' . $request->cid->extension();
        $path = $request->file('cid')->storeAs('images', $fileName, 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'cid' => $path,
            'currency' => $request->currency,
            'role' => 'partner',
            'openid' => Str::orderedUuid(),
            'password' => Hash::make($request->password),
        ]);

        $request->session()->put('code', $user->code);

        event(new Registered($user));

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new \App\Notifications\NewPartnerNotification($user));
        }

        return redirect('done');
    }
}
