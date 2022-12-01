<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GenericController extends Controller
{
    public function index()
    {
        $products=Product::where('status',2)->take(8)->get();
        return view('generic.index',compact('products'));
    }
}
