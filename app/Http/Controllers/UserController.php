<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super-admin');
        })->get();

        $superadmins = User::role('super-admin')->get();

        // Return the users
        return view('pages.users.index', compact('users', 'superadmins'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class, 'indisposable'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $email = strtolower(trim($request->email));

        $user = new User();

        $user->name         = $request->name;
        $user->email        = $email;
        $user->password     = Hash::make($request->password);
        $user->save();

        $user->assignRole('super-admin');

        return redirect()->back()->with('success', 'Admin created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        // Return the users
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'min:3', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        if (!empty($request->name)) {
            $user->name = $request->name;
        }

        if (!empty($request->email) && ($user->email !== $request->email)) {
            $user->email_verified_at = null;
            $user->email = $request->email;
        }

        if (!empty($request->password) && ($request->password === $request->password_confirmation)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting user: Please try again.');
        }
    }

    public function profile()
    {
        // Return the users
        return view('pages.users.profile');
    }

    public function profile_save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'string', 'max:255'],
        ]);

        $user = User::find(auth()->user()->id);

        $user->name = $request->name;

        if ($request->hasFile('image_path')) {

            if (!empty($user->image_path)) {
                mmadev_delete_attachment_from_directory($user->image_path, 'users');
            }

            $file = $request->file('image_path');
            $user->image_path = mmadev_store_and_get_image_path('users', $file);
        }

        $user->save();

        // Return the users
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function password_update(Request $request)
    {

        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'different:old_password'],
        ]);

        $user = User::find(auth()->user()->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }
    }
}