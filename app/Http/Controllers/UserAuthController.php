<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;


class UserAuthController extends Controller
{
    public function open_account() {
        return view('frontend.openaccount');
    }

    public function register_user(Request $request) {
        $request->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8',
            // 'phone' => 'required|digits:8',
            'company' => 'required',
            'role_in_company' => 'required',
            'company_type' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'address1' => 'required',
            'city' => 'required',
        ]);

        if (User::where('email', $request->email)->exists()) {
            throw ValidationException::withMessages(['email' => 'Email already exists.']);
        }
        
        $user = new User();
        $user->name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phonenumber = $request->phone;
        $user->worknumber = $request->worknumber;
        $user->company_name = $request->company;
        $user->role_in_company = $request->role_in_company;
        $user->vat = $request->vat;
        $user->company_website = $request->company_website;
        $user->company_type = $request->company_type;
        $user->eori_number = $request->eori;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->house = $request->house;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->email_verified_at = now();
        
        $user->save();
        $user->assignRole('user');

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
        // return redirect()->route('home')->with('success', 'User registered successfully!');
    }

    public function user_profile() {

        $user = Auth::user();
        return view('frontend.profile.profile', compact('user'));
    }
    
    public function edit_profile(Request $request) {

        $user = Auth::user();
        return view('frontend.profile.edit', compact('user'));
    }
    
    public function update_profile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'phone' => 'required',
            'company' => 'required',
            'role_in_company' => 'required',
            'company_type' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'address1' => 'required',
            'city' => 'required',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->back();
        }

        $user->name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->phonenumber = $request->phone;
        $user->worknumber = $request->worknumber;
        $user->company_name = $request->company;
        $user->role_in_company = $request->role_in_company;
        $user->vat = $request->vat;
        $user->company_website = $request->company_website;
        $user->company_type = $request->company_type;
        $user->eori_number = $request->eori;
        $user->country = $request->country;
        $user->postcode = $request->postcode;
        $user->house = $request->house;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        
        $user->save();

        return redirect()->route('user-profile')->with('success', 'User profile updated successfully!');
    }


}