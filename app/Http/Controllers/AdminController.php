<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function addUser(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string|in:user,anggota',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Login otomatis user yang baru ditambahkan
        Auth::login($user);


        // Redirect berdasarkan role
        if ($user->role === 'anggota') {
            return redirect()->route('anggota.dashboard')->with('success', 'Anggota berhasil ditambahkan dan login.');
        } elseif ($user->role === 'user') {
            return redirect()->route('user.dashboard')->with('success', 'User berhasil ditambahkan dan login.');
        }

        // Default redirect if role is not matched (this should not happen)
        return redirect()->route('welcome')->with('success', 'User berhasil ditambahkan dan login.');
    }


}
