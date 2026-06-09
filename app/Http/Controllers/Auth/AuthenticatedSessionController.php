<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 'owner') {
            return redirect('/owner/dashboard');
        }

        elseif ($user->role == 'kasir') {
            return redirect('/kasir/dashboard');
        }

        elseif ($user->role == 'supervisor') {
            return redirect('/supervisor/dashboard');
        }
        
        elseif ($user->role == 'gudang') {
            return redirect('/gudang/dashboard');
        }
        
        elseif ($user->role == 'manajer') {
            return redirect('/manajer/dashboard');
        }

        return redirect('/');
            }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
