<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.password-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'    => 'required',
            'password' => 'required',
        ]);

        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $userQuery = User::query()->where($field, $request->username);
        $user = $userQuery->first();

        if ($user && $user->isRole('examinee')) {
            return back()->withErrors(['login' => 'Examinees must use OTP login.']);
        }

        if (Auth::attempt([$field => $request->username, 'password' => $request->password], $request->boolean('remember'))) {
            $user = Auth::user();
            $token = auth('api')->login($user);

            return redirect()->route('dashboard')
                ->cookie(cookie()->make('token', $token, 60, null, null, true, true, false, 'Lax'));
        }

        return back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth('api')->logout();
        Auth::logout();
        return redirect('/')->withCookie(\Cookie::forget('token'));
    }
}
