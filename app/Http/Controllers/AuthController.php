<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\TblUser;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'nip' => 'required|digits:18|unique:tbl_user,nip',
            'nama_role' => 'required|in:pegawai,psikolog',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
        ], [
            'nip.unique' => 'NIP sudah terdaftar',
            'password.*' => 'Password Minimal 8 Karakter yang mengandung Huruf Besar, Huruf Kecil, Angka, dan Simbol',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('openAuth', true)
                ->with('form', 'register')
                ->withInput();
        }

        $user = TblUser::create([
            'nama_lengkap' => ucwords(strtolower($request->nama_lengkap)),
            'nip' => $request->nip,
            'nama_role' => $request->nama_role,
            'password' => Hash::make($request->password),
            'is_active' => 0,
            'verifikasi' => 'tidak aktif'
        ]);

        Auth::login($user);
        $user->update(['is_active' => 1]);

        return redirect('/' . $user->nama_role);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nip' => 'required|max:18',
            'password' => 'required'
        ]);

        $user = TblUser::where('nip', $request->nip)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['login' => 'NIP atau Password salah'])
                ->with('openAuth', true)
                ->with('form', 'login')
                ->withInput();
        }

        Auth::login($user);
        $user->update(['is_active' => 1]);

        return redirect('/' . $user->nama_role);
    }

    public function logout()
    {
        $user = Auth::user();
        if ($user) {
            $user->update(['is_active' => 0]);
        }

        Auth::logout();
        return redirect('/');
    }

    private function redirectByRole($user)
    {
        if ($user->nama_role === 'admin') {
            return redirect('/admin');
        }
        if ($user->nama_role === 'pegawai') {
            return redirect('/pegawai');
        }
        if ($user->nama_role === 'psikolog') {
            return redirect('/psikolog');
        }

        return redirect('/');
    }
}
