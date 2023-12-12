<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        // Retrieve all users
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function editUser($id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        // Update the user details
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function destroyUser($id)
    {
        // Delete the user
        User::findOrFail($id)->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
