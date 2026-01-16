<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function adminLogin()
    {
        return view('admin.pages.auth.login');
    }

    public function adminAuthenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('cpanel.dashboard')->with('login_success', true);
        }

        return back()
            ->with('error', 'Username atau password salah.')
            ->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $status = $request->input('status');

        return redirect()->route('cpanel.login')->with('success', $status);
    }

    public function showChangeUsername()
    {
        return view('admin.pages.settings.account.change-username');
    }

    public function changeUsername(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'username' => ['required', 'string', 'max:50', Rule::unique('users', 'username')->ignore($user->id)],
        ]);

        if (! \Illuminate\Support\Facades\Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->with('error', 'Password saat ini salah.');
        }

        if ($data['username'] === $user->username) {
            return back()->withErrors(['username' => 'Username baru harus berbeda dari yang sekarang.'])->with('error', 'Username baru harus berbeda dari yang sekarang.');
        }
        $user->update(['username' => $data['username']]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('cpanel.login')->with('success', 'Username berhasil diubah. Silakan login kembali.');
    }

    public function showChangePassword()
    {
        return view('admin.pages.settings.account.change-password');
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (! Hash::check($data['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->with('error', 'Password saat ini salah.');
        }

        $user->update(['password' => $data['password']]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('cpanel.login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }
}
