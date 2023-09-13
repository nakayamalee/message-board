<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cart;
use  App\Models\OrderForm;
use  App\Models\ProductOrder;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePrice(Request $request)
    {
        // dd($request);


        // return redirect(route('shopDeliverGet'));


    }
    public function storeDeliver(Request $request)
    {
        // dd($request);
         $request->session()->put('name',$request->name);
         $request->session()->put('address',$request->address);
         $request->session()->put('date',$request->date);
         $request->session()->put('phone',$request->phone);
         $request->session()->put('menu',$request->menu);


        //  dd(session()->all());


        return redirect(route('shopMoneyGet'));


    }
    public function storeMoney(Request $request)
    {
        // dd($request);
        //   dd(session()->get('name'));
        $request->session()->put('pay',$request->pay);

        OrderForm::create([

            'user_id' =>$request->user()->id,
            'name' =>session()->get('name'),
            'address' =>session()->get('address'),
            'date' =>session()->get('date'),
            'phone' =>session()->get('phone'),
            'menu' =>session()->get('menu'),
            'total' =>session()->get('total'),
            'pay' =>session()->get('pay'),

        ]);

        return redirect(route('shopThxGet'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'qty'=>'required|min:1|numeric',
            'cart_id'=>'required|exists:carts,id|numeric',
        ]);

        // $cart = Cart::where('user_id',$request->user()->id)->where('product_id',$request->product_id);
        $cart = Cart::find($request->cart_id);
        // dd($cart);
        $updateCart=$cart ->update([
         'qty'=>$request->qty,
        //  'user_id'=>$request->user()->id,
        ]);

        return(object)[
            'code'=>$updateCart ? 1 : 0,
            'price'=>($cart->product?->price ?? 0)* $cart->qty,
        ];



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function orderdetails(Request $request)
    {

        $itembuys = Cart::where('user_id',$request->user()->id)->get();
        $total = 0;
        // $itembuys = Cart::get();
        foreach($itembuys as $value){
            $total += $value->product->price * $value->qty;
        };

        session()->forget('total');
        session()->put('total',$total);

        return view('shopprocess.orderdetails', compact('itembuys','total'));
    }

    public function deliver()
    {
        $hasBeen = session()->all();
        return view('shopprocess.deliver',compact('hasBeen'));
    }

    public function money()
    {

        return view('shopprocess.money');
    }

    public function thx()
    {
        return view('shopprocess.thx');
    }
    public function ordercheck(Request $request)
    {
        $orderResult = OrderForm::where('user_id',$request->user()->id)->get();
        $latestOrder = OrderForm::orderBy('created_at', 'desc')->first();
        $latestOrder_id = $latestOrder->id;

        $itembuys = Cart::where('user_id',$request->user()->id)->get();
        foreach ($itembuys as $itembuy){
            ProductOrder::create([
                'form_id' =>$latestOrder_id,
                'product_id' =>$itembuy->product_id,
                'qty' =>$itembuy->qty,
                'price' =>$itembuy->product->price,
            ]);
        }

        $request->session()->forget('name');
        $request->session()->forget('address');
        $request->session()->forget('date');
        $request->session()->forget('phone');
        $request->session()->forget('menu');
        $request->session()->forget('total');
        $request->session()->forget('pay');






        return view('shopprocess.ordercheck',compact('orderResult','itembuys'));
    }


}
