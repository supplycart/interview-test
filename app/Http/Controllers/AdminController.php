<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    
    public function index()
    {
        return view('admin');
    }

    public function store(Request $request)
    {
        $product = new Admin();

        $product ->productname = $request->input('productname');
        $product ->productdesc = $request->input('productdesc');
        $product ->stock = $request->input('stock');
        $product ->price = $request->input('price');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        } else {
            return $request;
            $product->image = '';
        }

        $product->save();

        return view('admin')->with('product',$product);
    }

    public function display()
    {
        $products = Admin::all();
        return view('dashboard')->with('products', $products);
    }
}
