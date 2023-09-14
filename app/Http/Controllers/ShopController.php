<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderForm;
use App\Models\ProductOrder;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;

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


        // return redirect(route('shopDeliverGet'));


    }
    public function storeDeliver(Request $request)
    {
        // 驗證

         $request->session()->put('name',$request->name);
         $request->session()->put('address',$request->address);
         $request->session()->put('date',$request->date);
         $request->session()->put('phone',$request->phone);
         $request->session()->put('menu',$request->menu);




        return redirect(route('shopMoneyGet'));


    }
    public function storeMoney(Request $request)
    {
        $request->validate([
            'pay' => 'required|numeric',
        ]);


        // 找購物車屬於使用者的資料
        $itembuys = Cart::where('user_id',$request->user()->id)->get();

        $todayOrderCount = OrderForm::whereDate('created_at', today())->get()->count();

        $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        $shuffle = str_shuffle($string);

        // 建立主表(order)
        $form = OrderForm::create([
            'order_id' => 'HW' . date("Ymd") . str_pad($todayOrderCount, 4, '0', STR_PAD_LEFT) . substr($shuffle, 0, 3),
            'user_id' =>$request->user()->id,
            'name' => session()->get('name'),
            'address' => session()->get('address'),
            'date' => session()->get('date'),
            'phone' => session()->get('phone'),
            'menu' => session()->get('menu') ?? '',
            'pay' => $request->pay,
        ]);
        
        // 預設總價為0
        $total = 0;

        // 購物車有幾筆就執行幾次
        foreach($itembuys as $value){
            $total += $value->product_withTrashed->price * $value->qty;

            ProductOrder::create([
                'form_id' => $form->id,
                'qty' => $value->qty,
                'price' => $value->product->price,
                'name' => $value->product->name,
                'image' => $value->product->image,
                'desc' => $value->product->desc,
            ]);

            $value->delete();
        };

        $form->update([
            'total' => $total,
        ]);

        session()->forget(['name', 'address', 'date', 'phone', 'menu']);

        // $data = [
        //     'name' => $request->user()->name,
        //     'order_id' => $form->order_id,
        //     'total' => $total,
        // ];

        // Mail::to($request->user()->email)->send(new OrderCreated($data));
        if ($request->pay === 1) {
            return redirect(route('shopThxGet'));
        } else {
            return redirect(route('ecpay', ['order_id' => $form->id]));
        }
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

        $request->validate([
            'qty'=>'required|min:1|numeric',
            'cart_id'=>'required|exists:carts,id|numeric',
        ]);

        // $cart = Cart::where('user_id',$request->user()->id)->where('product_id',$request->product_id);
        $cart = Cart::find($request->cart_id);
        $updateCart=$cart ->update([
         'qty'=>$request->qty,
        //  'user_id'=>$request->user()->id,
        ]);

        return(object)[
            'code'=>$updateCart ? 1 : 0,
            'price'=>($cart->product_withTrashed?->price ?? 0)* $cart->qty,
        ];



    }

    public function deleteCart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
        ]);

        $cart = Cart::find($request->cart_id)->delete();

        $carts = Cart::where('user_id', $request->user()->id)->get();
        
        $total = 0;
        foreach ($carts as $value) {
            $total += $value->product_withTrashed->price * $value->qty;
        }
        return (object)[
            'code' => $cart ? 1 : 0,
            'id' => $request->cart_id,
            'total' => $total,
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
            $total += $value->product_withTrashed->price * $value->qty;
        };

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
        // $orderResult = OrderForm::where('user_id',$request->user()->id)->get();
        // $latestOrder = OrderForm::orderBy('created_at', 'desc')->first();
        // $latestOrder_id = $latestOrder->id;

        // $itembuys = Cart::where('user_id',$request->user()->id)->get();
        // foreach ($itembuys as $itembuy){
        //     ProductOrder::create([
        //         'form_id' =>$latestOrder_id,
        //         'product_id' =>$itembuy->product_id,
        //         'qty' =>$itembuy->qty,
        //         'price' =>$itembuy->product_withTrashed->price,
        //     ]);
        // }

        // $request->session()->forget('name');
        // $request->session()->forget('address');
        // $request->session()->forget('date');
        // $request->session()->forget('phone');
        // $request->session()->forget('menu');
        // $request->session()->forget('total');
        // $request->session()->forget('pay');






        // return view('shopprocess.ordercheck',compact('orderResult','itembuys'));
    }


}
