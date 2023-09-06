<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::where('status','=',1)->get();
        return view('welcome',compact('products'));
    }
    // public function test()
    // {
    //     $products = Product::where('status','=',1)->get();
    //     return view('welcome',compact('products'));
    // }
    // public function index()
    // {
    //     $products = Product::where('status','=',1)->get();
    //     return view('welcome',compact('products'));
    // }
}
