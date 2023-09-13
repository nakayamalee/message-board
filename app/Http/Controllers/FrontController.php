<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Product;
use  App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('status','=',1)->get();
        return view('welcome',compact('products'));
    }


    // 使用者資訊頁
    public function user_info(Request $request)
    {
        // 法一(拿到使用者資訊)
        // dd(Auth::user();

        // 法二
        // dd($request->user());
        $user=$request->user();
        return view('userSetting',compact('user'));
    }


    public function user_info_update(Request $request)
    {
        // 方法一
        $request->validate([
            'name'=>'required|max:255',
        ],[
            'name.required'=>'名字必填',
            'name.max'=>'字數過長',
        ]);

    //    $validator= Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //     ]);
    //     // dd($validator->fails());
    //     if($validator->fails()){
    //         return redirect(route('user.info'))->withErrors(['nameError'=>'帳號名稱字數過多']);
    //     }


        $user=$request->user();
        $user->update([
            'name'=>$request->name,
        ]);
        // return view('userSetting');
        return redirect(route('user.info'));
    }

    public function test(Request $request){

        $hasBeen = $request->session()->get('mytest');
        $request->session()->forget('mytest');
        return view('test',compact('hasBeen'));
    }

    public function test2(Request $request){
        // $request->session()->put('mytest','曾經到過test1');
        $phone=   $request->session()->get('form_phone','');
        return view('test2',compact('phone'));
    }


    public function testStore(Request $request){
        $request->validate([
            'phone'=>'required',
        ]);
        $request->session()->put('form_phone',$request->phone);
        return redirect('test2');
    }


    public function product()
    {
        $products = Product::where('status', 1)->get();
        return view('frontProduct', compact('products'));
    }



    public function add_cart(Request $request){
        $request->validate([
            'qty'=>'required|min:1|numeric',
            'product_id'=>'required|exists:products,id|numeric',

        ]);

        // 寫法一
        $oddCart = Cart::where('user_id', $request->user()->id)->where('product_id', $request->product_id)->first();

        if( $oddCart){
            $cart = $oddCart->update([
                'qty'=>$oddCart->qty + $request->qty,
            ]);
        }else{
            $cart = Cart::create([
                'product_id'=>$request->product_id,
                'qty'=>$request->qty,
                'user_id'=>$request->user()->id,
            ]);
        }

        // 寫法二
        // User::updateOrcreate(['name'=>'Lisi'])


        // $cart = Cart::create([
        //     'product_id'=>$request->product_id,
        //     'qty'=>$request->qty,
        //     'user_id'=>$request->user()->id,
        // ]);
        return (object)[
            'code'=>$cart ? 1 : 0,
            'product_id'=>$request->product_id,
        ];
        // $request->session()->put('form_phone',$request->phone);
        // return redirect('test2');
        }


}

