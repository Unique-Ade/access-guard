<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10); 
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|in:user,admin',
    ]);

    $user->role = $request->role;
    $user->save();

    logActivity('Changed role of ' . $user->name . ' to ' . $user->role);

    return redirect()->route('admin.users.index')->with('success', 'User role updated successfully.');
}

public function destroy(User $user)
{
    logActivity('Deleted user ' . $user->name);

    $user->delete();

    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}

}
