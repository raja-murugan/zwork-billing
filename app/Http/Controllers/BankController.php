<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BankController extends Controller
{
    public function index()
    {
        $data = Bank::where('soft_delete', '!=', 1)->orderBy('id', 'DESC')->get();

        return view('page.backend.bank.index', compact('data'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Bank();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->note = $request->get('note');

        $data->save();


        return redirect()->route('bank.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $BankData = Bank::where('unique_key', '=', $unique_key)->first();
        $BankData->name = $request->get('name');
        $BankData->note = $request->get('note');

        $BankData->update();

        return redirect()->route('bank.index')->with('info', 'Updated !');
    }

    public function delete($unique_key)
    {
        $data = Bank::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('bank.index')->with('warning', 'Deleted !');
    }

}
