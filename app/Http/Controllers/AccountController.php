<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts/accounts')->with(['accounts' => Account::all()]);
    }

    public function create()
    {
        return view('accounts/create');
    }

    public function store(Request $request)
    {
        $account = new Account;
        $account->name = $request->name;
        $account->description = $request->description;
        $account->save();

        return redirect("/accounts/{$account->id}/bills");
    }
}
