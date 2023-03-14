<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
            'phoneNumber' => ['required', 'string', 'max:11'],           
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $url = "storage/";
        $photo = $request->file('photo');
        $photo_name = $photo->getClientOriginalName();      
        $photo_storage = $photo->storeAs("public/uploads", $photo_name);
        $photo_path = 'storage/uploads/'.$photo_name;
        $user = User::create([
            'name' => $request->name,          
            'type' => $request->type,          
            'phoneNumber' => $request->phoneNumber,          
            'password' => Hash::make($request->password),
            'photo'=> $photo_path,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
