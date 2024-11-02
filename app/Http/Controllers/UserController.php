<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Check if user is an admin
        if (Auth::user()->is_admin) {
            // Get all users and show them on the dashboard
            $users = User::all();
            return view('dashboard', compact('users'));
        } else {
            // if user is not an admin redirect to home
            return redirect('/');
        }
    }

    public function adminToggle(Request $request, $id) {
        if (Auth::user()->is_admin) {

            $user = User::findOrFail($id);
            $user->is_admin = $user->is_admin ? 0 : 1;
            $user->save();

            echo "the toggle has been switched";
            return redirect()->back()->with('status', 'User role updated successfully!');

        }
    }
}
