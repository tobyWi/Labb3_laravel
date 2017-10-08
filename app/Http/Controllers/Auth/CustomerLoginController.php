<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends LoginController
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected function guard()
    {
        return Auth::guard('customer');
    }

    public function showLoginForm()
    {
        return view('auth.customersLogin');
    }
}
