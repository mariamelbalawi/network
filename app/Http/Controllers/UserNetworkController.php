<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserNetworkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $department = $user->department;
        $networks = $department->networks()->with('ports')->get();

        return view('user.networks', compact('department', 'networks'));
    }
}