<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

Route::get('/clients/add', [ClientController::class, 'create'])->middleware('auth')->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->middleware('auth');

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'telephone' => 'nullable',
            'address' => 'nullable',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($request->hasFile('company_logo')) {
            $file = $request->file('company_logo');
            $path = $file->store('company_logos', 'public');
            $filename = $file->hashName();
        } else {
            $filename = null;
        }

        $client = new Client([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),
            'company_logo' => $filename,
        ]);
        $client->save();

        return redirect('/dashboard')->with('success', 'Client added successfully');
    }
}