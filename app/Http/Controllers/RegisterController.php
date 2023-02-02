<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate ([
            'name' => ['required', 'min:5', 'max:255', 'Unique:users'],
            'email' => ['required', 'email:dns', 'Unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session();
        return redirect('/')->with('success', 'Registrasi Berhasil MasBro!! Otw Login GAS!!');;
    }
}