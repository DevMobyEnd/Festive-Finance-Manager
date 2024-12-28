<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Account::create([
            'name' => $request->name,
            'current_balance' => 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }
}
