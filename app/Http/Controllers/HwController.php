<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Response;
use  App\Models\ResponseSent;

class HwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responses = Response::get();
        $re = ResponseSent::get();

        // dd($responses);
        return view('homework',compact('responses','re'));
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
    public function store(Request $request)
    {
        // dd($request);

        Response::create([
            'response'=>$request->response,
        ]);

        return redirect(route('hw.index'));
    }

    public function hwRe(Request $request,$id){
        //  dd(ResponseSent::get());

            ResponseSent::create([
            're'=>$request->re,
            'response_id'=>$id,
            ]);
            return redirect(route('hw.index'));

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
    public function update(Request $request, string $id)
    {
        // dd($request,$id);
        $modify = Response::find($id);
        // dd( $modify );
        $modify ->update([
            'response'=>$request->modify,
        ]);
        return redirect(route('hw.index'));
    }
    public function hwReModify(Request $request, string $id)
    {
        // dd($request,$id);
        $reModify = ResponseSent::find($id);
        // dd( $reModify );
        $reModify ->update([
            're'=>$request->remodify,
        ]);
        return redirect(route('hw.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('123');
        $de = Response::find($id);

        foreach($de->responseSent ?? [] as $value){
            $value->delete();
        }
        $de->delete();
        // $reDe = ResponseSent::get();
        // dd($reDe);
        // $reDe->delete();
        // -------------------

        return redirect(route('hw.index'));


    }
    public function hwReDelete(string $id)
    {
        // dd('123');
        $reDe = ResponseSent::find($id);
        // dd($reDe );
        $reDe->delete();
        return redirect(route('hw.index'));


    }
}
