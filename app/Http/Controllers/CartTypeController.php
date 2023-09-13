<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\ProductType;
use  App\Models\ProductTypeImg;
use  App\Services\FileService;

class CartTypeController extends Controller
{
    protected $FileService;

    public function __construct(FileService $item)
    {
        $this->FileService=$item;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user=$request->user();
        $types = ProductType::get();
        // $typesImg = ProductType::get();
        // dd($typesImg->productType);
        return view('producType.typeProductList',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producType.typeAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type=ProductType::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
        ]);

        foreach($request->image ?? [] as $value){
            ProductTypeImg::create([
                'image'=>$this->FileService->imgUpload($value,'type-image'),
                'product_type_id'=>$type->id,
            ]);

        }
        return redirect(route('type.index'));
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
        // dd($id);
        $type = ProductType::find($id);
        return view('producType.typeEdit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        $type = ProductType::find($id);
        $type ->update([
            'name'=>$request->name,
            'desc'=>$request->desc,
        ]);

        if($request->hasFile('image')){
            foreach($type->productTypeImg ?? [] as $value){
                // dd($value);
                $this->FileService->deleteUpload($value->image);
                $value->delete();
            }

            foreach($request->image ?? [] as $value){
                ProductTypeImg::create([
                    'image'=>$this->FileService->imgUpload($value,'type-image'),
                    'product_type_id'=>$id,

                ]);
            }
        }
        return redirect(route('type.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    // 寫法一:
    // public function destroy(string $id)
    // {
    //     dd(123);
    //     $type = ProductType::find($id);
    //     foreach($type->productTypeImg ?? [] as $value){
    //         $this->FileService->deleteUpload($value->image);
    //         $value->delete();
    //     }
    //     $type->delete();
    //     return redirect(route('type.index'));
    // }

    /*
    params $id:產品類別id
    return'success':'fail'=>表示成功或失敗

    */


    public function destroy(string $id)
    {
        // dd(123);
        $type = ProductType::find($id);
        $result = 'success';

        if($type){
            // $result = 'success';
            foreach($type->productTypeImg ?? [] as $value){
                $this->FileService->deleteUpload($value->image);
                $value->delete();
            }
            $type->delete();
        }else{
            $result = 'fail';
        }


        return $result;
    }

}
