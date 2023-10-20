<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddonController extends Controller
{
    public function index()
    {
        $data = Addon::where('soft_delete', '!=', 1)->get();

        return view('page.backend.addon.index', compact('data'));
    }


    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Addon();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');

        $data->save();


        return redirect()->route('addon.index')->with('message', 'Added !');
    }


    public function edit(Request $request, $unique_key)
    {
        $Data = Addon::where('unique_key', '=', $unique_key)->first();
        $Data->name = $request->get('name');

        $Data->update();

        return redirect()->route('addon.index')->with('info', 'Updated !');
    }

    public function delete($unique_key)
    {
        $data = Addon::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('addon.index')->with('warning', 'Deleted !');
    }
}
