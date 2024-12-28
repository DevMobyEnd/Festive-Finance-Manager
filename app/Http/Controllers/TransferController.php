<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric',
            'type' => 'required|in:incoming,outgoing',
            'date' => 'required|date',
        ]);

        $account = Account::findOrFail($request->account_id);

        if ($request->type === 'outgoing' && $request->amount > $account->current_balance) {
            return back()->withErrors('Insufficient balance.');
        }

        Transfer::create($request->all());

        $account->current_balance += $request->type === 'incoming' ? $request->amount : -$request->amount;
        $account->save();

        return redirect()->route('dashboard')->with('success', 'Transfer recorded successfully!');
    }
}
