<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction};
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'outcome')->sum('amount');
        return view('profile', ['transactions' => $transactions, 'totalIncome' => $totalIncome, 'totalExpense' => $totalExpense]);
    }

    public function index2()
    {
        $user = Auth::user();
        return view("profile_settings", ['user' => $user]);
    }

    public function edit_info(Request $request) {
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'fathername' => $request->fathername,
            'phone' => $request->phone,
            'email' => $request->email,
            'tg_tag' => $request->tg_tag,
        ]);
        return redirect()->back();
    }

    public function delete_transaction($id) {
        Transaction::where('id', $id)->delete();
        return redirect()->back();
    }

    public function filter(Request $request)
    {
    if (($request->category) == 'all') {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
    } else {
        $transactions = Transaction::where('user_id', Auth::user()->id)->where('category', $request->category)->get();
    }
    $totalIncome = $transactions->where('type', 'income')->sum('amount');
    $totalExpense = $transactions->where('type', 'outcome')->sum('amount');
    return view('profile', ['transactions' => $transactions, 'totalIncome' => $totalIncome, 'totalExpense' => $totalExpense]);
    }
}
