<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function load(){
       
       
        if (!Storage::disk('local')->exists('test/zag.spr')) {
            $data=Product::withCount('prices')->get();
            //dd($data[0]->prices);
            $content=$this->text();
            foreach($data as $item){
               // 669;;ARTEL SI 2531;ARTEL SI 2531;430000;0;;0,1,1,1,1,1,1,1,1,0,1,0,0,1;;;;1;1;;;1;1;;;;;;4;;;ARTEL0030;;;;;;;;;;;;;;;;;;;;;;;;;;;;;0;0;;2;;
               if($item->prices_count>0){
                   $content=$content.$item->id.";;".$item->name.";".$item->name.";".$item->prices[$item->prices_count-1]->price.";0;;0,1,1,1,1,1,1,1,1,0,1,0,0,1;;;;1;1;;;1;0;;;;;;4;;;".$item->sap.";;;;;;;;;;;;;;;;;;;;;;;;;;;;;0;0;;2;;\n";

               } 
    
            }
            
            $file=Storage::disk('local')->put('test/zag.txt',$content);
            Storage::disk('local')->put('test/zag.spr','');
            return to_route('shop.index');
        }else{
            //dd('error');
            return to_route('shop.index')->withErrors('there file on porcess try later');
        }
        
        //dd($file);

    }
    protected function text(){
        $content="##@@&&\n#\n\n";
        
        
        $content=$content."$$$"."ADDQUANTITY\n";
        
        
        return $content;
    }
}

