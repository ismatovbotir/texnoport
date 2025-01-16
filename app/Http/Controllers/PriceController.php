<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceImportRequest;
use Illuminate\Http\Request;
use App\Imports\PriceImport;
use Maatwebsite\Excel\Facades\Excel;

class PriceController extends Controller
{
    public function import(PriceImportRequest $request){
        $request->validated();
        Excel::import(new PriceImport,$request->file('xls') );
        
        return to_route('product.index')->with('success', 'All good!');

    }
    public function index(){
       // dd('fre');
        return view('price.index');
    }
}
