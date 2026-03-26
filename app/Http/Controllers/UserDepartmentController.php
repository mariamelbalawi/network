<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDepartmentController extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $department = $user->department;

        return view('user.department', compact('department'));
    }
}