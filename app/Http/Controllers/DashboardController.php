<?php

namespace App\Http\Controllers;

use App\Support\Helpers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): RedirectResponse|View
    {
        if (Helpers::authCheck()) {
            return view('dashboard');
        }

        return redirect("login")->withErrors('You are not allowed to access');
    }
}
