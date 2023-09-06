<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use  App\Models\Product;
use Illuminate\Support\Facades\Storage;
use  App\Services\FileService;
use  App\Models\ProductType;



class CartController extends Controller
{
   // ---------------使用service-----------------------------------
    protected $FileService;

    public function __construct(FileService $item)
    {
        $this->FileService=$item;
    }

    // public function__construct(protected FileService $fileService)
    // {

    // }


    use AuthorizesRequests, ValidatesRequests;
   // ----------------新增產品--------------------------------------------
    public function cartAdd()
    {
        // dd(today());
        return view('freshCart.cartAdd');
    }
   // -----------------編輯產品-----------------------------------------------
    public function cartEdit($id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('freshCart.cartEdit', compact('product'));
    }

   // ------------------產品清單--------------------------------------------------
    public function cartProductList(Request $request)
    {
        // dd($request->all());


        // if($request->filled('name')){
        //     $items = Product::where('name','=',$request->name)->get();
        // }else{
        //     $products = Product::get();
        // }

        $products = Product::query();

        $name= $request->name ?? '';

        if($request->filled('name')){
            // $products->where('name',$name)->orWhere('desc',$name);

            // 模糊搜尋
            $products->where('name','like',"%$name%")->orWhere('desc',$name);
            // $products->where('name','like','%'.$name.'%')->orWhere('desc',$name);
        }

        $products = $products->paginate(5);
        $products->withPath('/cart-product-list?name=' . $name);
        // $products->appends(['name' =>$name]);

        return view('freshCart.cartProductList',compact('products','name'));
        // http://127.0.0.1:8000/product/list?name=yydd&page=2
        // http://127.0.0.1:8000/cart-product-list?name=yydd&page=2
    }

     // -------------------------------------------------------------------
      // public function cartStore()
      // {
      //     return view('freshCart.cartProductList');
      // }
     // -----------------儲存資料-----------------------------------------------------


    public function cartStore(Request $request)
    {
        // 驗證資料是否合規範
        // 查看請求的資料form表單裡的input
        // 方法一:
        // $path = Storage::putFile('public/upload',$request->file('image'));
        // 方法二:
        $path = $this->FileService->imgUpload($request->file('image'),'product-image');

        // dd($request->image);
        Product::create([
            'name' =>  $request->name,
            // 'image' =>  str_replace('public','storage',$path),
            'image' => $path,
            'price' =>  $request->price,
            'status' =>  $request->status,
            'desc' =>  $request->desc,
        ]);
        // dd($request->all());
        return redirect(route('namecartProductList'));
        // return view('freshCart.cartProductList');
    }

     // -----------------更新資料---------------------------------

    public function cartUpdate($id,Request $request){
        // dd($request->all());
        // dd($id);
        $path=null;
        $product = Product::find($id);

       //     if($request->file('image')){
      //     $path = Storage::putFile('public/upload',$request->file('image'));//新圖片
      //     Storage::delete(str_replace('storage','public',$product->image));//舊圖片
      //     }


      //     $product ->update([
      //         'name'=>$request->name,
      //         'image'=>str_replace('public','storage',$path),
      //         'price' => $request->price,
      //         // 'status'=>  $request->status,
      //         'desc'=>  $request->desc,
      //     ]);

        if($request->file('image')){
            $path = $this->FileService->imgUpload($request->file('image'),'product-image');
            $this->FileService->deleteUpload($product->image);
            $product ->update([
                        'name'=>$request->name,
                        'image'=>$path,
                        'price' => $request->price,
                        'status'=>  $request->status,
                        'desc'=>  $request->desc,
                    ]);
        }else{
            $product ->update([
                'name'=>$request->name,
                'price' => $request->price,
                'status'=>  $request->status,
                'desc'=>  $request->desc,
            ]);
        };
        return redirect(route('namecartProductList'));
        // return view('freshCart.cartProductList');
    }

     // -----------------刪除資料---------------------------------

      public function cartDelete($id){
        // dd($id);
        $product = Product::find($id);
        $this->FileService->deleteUpload($product->image);
        $product->delete();
        return redirect(route('namecartProductList'));

      }

}


