<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Функция для авторизации
     * @param AuthorizationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth_post(AuthorizationRequest $request)
    {
        if (Auth::attempt($request->validated())) {
                $request->session()->regenerate();
                return redirect()->route('about');
        }
        return back();
    }

    public function registr_post(RegistrationRequest $request)
    {
       $requests = $request->validated();
       $requests['password'] = Hash::make($requests['password']);
       User::create($requests);
       return redirect()->route('auth');

    }
    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->regenerate();
       return redirect()->route('about');
    }

}
