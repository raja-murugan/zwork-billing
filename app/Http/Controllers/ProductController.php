<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $Productdata = Product::where('soft_delete', '!=', 1)->orderBy('id', 'DESC')->get();
        return view('page.backend.product.index', compact('Productdata'));
    }

    public function store(Request $request)
    {
        $randomkey = Str::random(5);

        $data = new Product();

        $data->unique_key = $randomkey;
        $data->name = $request->get('name');
        $data->description = $request->get('description');

        $data->save();
        return redirect()->route('product.index')->with('message', 'Added !');
    }

    public function edit(Request $request, $unique_key)
    {
        $ProductData = Product::where('unique_key', '=', $unique_key)->first();

        $ProductData->name = $request->get('name');
        $ProductData->description = $request->get('description');

        $ProductData->update();

        return redirect()->route('product.index')->with('info', 'Updated !');
    }

    public function delete($unique_key)
    {
        $data = Product::where('unique_key', '=', $unique_key)->first();

        $data->soft_delete = 1;

        $data->update();

        return redirect()->route('product.index')->with('warning', 'Deleted !');
    }




    public function getProducts()
    {
        $GetProduct = Product::orderBy('name', 'ASC')->where('soft_delete', '!=', 1)->get();
        $userData['data'] = $GetProduct;
        echo json_encode($userData);
    }
}
