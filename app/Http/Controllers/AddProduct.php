<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AddProduct extends Controller
{
    public function add()
    {
        $products = Product::all();
        return view('add', ['products' => $products]);
    }

    public function store(Request $request)
    {
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return redirect('add');
    }
}
