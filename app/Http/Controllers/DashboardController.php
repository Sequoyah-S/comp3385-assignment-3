<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

class DashboardController extends Controller
{
    public function index(): view
    {
        $clients = Client::all();

        return view('dashboard', compact('clients'));
    }
}
