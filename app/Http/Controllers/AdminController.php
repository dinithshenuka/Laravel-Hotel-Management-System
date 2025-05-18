<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user()->user_type;
            if ($user == 'admin') {
                return view('admin.index');
            } else if ($user == 'user') {
                return view('dashboard');
            } else {
                return redirect('/')->with('error', 'Unauthorized access');
            }
        }
    }
}
