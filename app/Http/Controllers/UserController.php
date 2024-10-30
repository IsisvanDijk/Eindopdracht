<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Controleer of de huidige gebruiker een admin is
        if (Auth::user()->is_admin) {
            // Haal alle gebruikers op en toon het dashboard
            $users = User::all();
            return view('dashboard', compact('users'));
        } else {
            // Als de gebruiker geen admin is, doorverwijzen naar home
            return redirect('/');
        }
    }

    public function adminToggle(Request $request, $id) {
        if (Auth::user()->is_admin) {
            $user = User::findOrFail($id);
            $user->is_admin = !$user->is_admin;
            $user->save();

            return redirect()->back()->with('status', 'User role updated successfully!');

        }
    }
}
