<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        return redirect()->route('izin.index');
    }
}
