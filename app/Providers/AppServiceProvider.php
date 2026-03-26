<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // توجيه المستخدم حسب نوعه
        Route::get('/redirect-by-role', function () {
            if (Auth::check()) {
                if (Auth::user()->role === 'admin') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/user-department');
                }
            }

            return redirect('/login');
        });
    }
}