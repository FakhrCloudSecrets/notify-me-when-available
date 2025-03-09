<?php

namespace Task\NotifyMeWhenAvailable\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Task\NotifyMeWhenAvailable\Repositories\ProductRepositories;

class AuthController extends Controller
{
    public function __construct(protected ProductRepositories $productRepositories)
    {
        //
    }

    public function dashboardLoginForm()
    {
        return view('notify-me-when-available::dashboard_login');
    }

    public function dashboardLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            /**
             * @var User $user 
             */
            $user = Auth::guard('user')->user();
            if ($user->hasRole('admin')) {
                return redirect(route('product.edit'));
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function loginForm()
    {
        return view('notify-me-when-available::login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect(route('product.index'));
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
