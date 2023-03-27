<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return view('index', compact('transactions'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->fill($request->all());
        $transaction->save();

        return redirect()->route('index');
    }

    public function edit(Transaction $transaction)
    {
        return view('edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $transaction->fill($request->all());
        $transaction->save();

        return redirect()->route('index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('index');
    }
}
