<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction};
use Auth;

class TransactionController extends Controller
{
    public function transactions(Request $request) {

        Transaction::create([
            'category' => $request->category,
            'user_id' => Auth::user()->id,
            'date' => $request->date,
            'source' => $request->source,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);
        $transaction = Transaction::where('user_id', Auth::user()->id)->get();
        return redirect()->back()->with('transactions', $transaction);
    }
    // Данная функция transactions нужна для создания транзакции и занесения её в базу данных, откуда она будет выводиться в представление

}
