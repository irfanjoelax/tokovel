<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * menampilkan halaman profil
     */
    public function index()
    {
        $user =  User::find(Auth::user()->id);

        if ($user->hasRole('admin')) {
            return view('admin.profile');
        }

        return view('user.profile');
    }

    /**
     * Proses ubah profil dan password
     */
    public function changeProfile(Request $request)
    {
        $user =  User::find(Auth::user()->id);

        if (empty($request->password)) {
            $password = $user->password;
        } else {
            $password = Hash::make($request->password);
        }

        $user->update([
            'name' => Str::title($request->name),
            'email' => $request->email,
            'password' => $password
        ]);

        if ($user->hasRole('admin')) {
            return redirect('admin/profile')
                ->with('alert-primary', 'Selamat, Profile anda berhasil diubah');
        }

        return redirect('user/profile')
            ->with('alert-primary', 'Selamat, Profile anda berhasil diubah');
    }
}
