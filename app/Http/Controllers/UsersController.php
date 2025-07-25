<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Models\UserHistory;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10); // exclude admin
        return view('pages.penggunasAdmins', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        UserHistory::create([
            'user_id' => auth()->id(),
            'activity' => 'Menambahkan Users',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //return view('admin.users.edit', compact('user'));
        // return view('admin.users.edit', compact('user'));
        // return view('users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
        //
        // dd($user);
        $users = $user;
        return view('pages.editPenggunas', compact('users'));
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email,' . $user->id,
        //     'password' => 'nullable|string|min:6|confirmed',
        //     'role' => 'required|in:user,admin',
        // ]);

        // $data = $request->only('name', 'email', 'role');
        // if ($request->filled('password')) {
        //     $data['password'] = Hash::make($request->password);
        // }


        // $user->update($data);

        // return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:user,admin',
        ]);

        $data = $request->only('name', 'email', 'role');
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }


        $user->update($data);
        UserHistory::create([
            'user_id' => auth()->id(),
            'activity' => 'Edit Users',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        UserHistory::create([
            'user_id' => auth()->id(),
            'activity' => 'Hapus Users Ini',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');

    }
}
