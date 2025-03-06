<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Hämta sorteringsparametrar från förfrågan
        $sortBy = $request->get('sort_by', 'id');  // Standard sortering: ID
        $sortOrder = $request->get('sort_order', 'asc');  // Standard ordning: asc

        // Hämtar användare och tillämpar sortering om det behövs
        $users = User::query();

        // Kontrollera om sortBy är en giltig kolumn
        if (in_array($sortBy, ['id', 'name', 'email', 'role'])) {
            $users->orderBy($sortBy, $sortOrder);
        }

        $users = $users->paginate(10);

        return view('users.index', compact('users', 'sortBy', 'sortOrder'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:3|confirmed',
                'role' => 'required|in:admin,employee',
            ]
        );

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]
        );

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];

        if ($request->filled('password')) {
            if ($request->user()->id !== $user->id) {
                return back()->with('error', 'You are not allowed to change passwords for other users.');
            }
        }

        if (
            $request->filled('current_password')
            || $request->filled('password')
            || $request->filled('password_confirmation')
        ) {
            $rules['current_password'] = 'required';
            $rules['password'] = 'required|min:3|confirmed';
        }

        $validated = $request->validate($rules);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('current_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function updateRole(Request $request, User $user)
    {
        $currentUser = $request->user();

        if ($currentUser->cannot('manage-users')) {
            return redirect()->route('users.index')->with('error', 'You do not have permission to change user roles.');
        }

        $request->validate(
            [
                'role' => 'required|in:admin,employee',
            ]
        );

        $user->update(
            [
                'role' => $request->role,
            ]
        );

        return redirect()->route('users.index')->with('success', 'User role updated successfully.');
    }

    public function destroy(User $user)
    {
        if (request()->user()->id === $user->id) {
            return redirect()->route('users.index')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
