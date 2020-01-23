<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;

class ProductTypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $producttypes = ProductType::all();
        return view('producttypes.index', compact('producttypes'));
    }

    public function create(){

        return view('producttypes.create');
    }

    private function performValidation(Request $request){

        $rules = [
            'name' => 'required|min:3'
        ];

        $this->validate($request, $rules);

    }

    public function store( Request $request){

        $this->performValidation($request);

        //dd($request->all());
        $producttype = new ProductType();
        $producttype-> name =  $request->input('name');
        $producttype-> description =  $request->input('description');
        $producttype-> save(); //insert

        $notification ='New product added.';
        return redirect('/producttypes')->with(compact('notification'));
    }


    public function edit(ProductType $producttype){

        return view('producttypes.edit', compact('producttype'));
    }

    public function update( Request $request, ProductType $producttype){

        $this->performValidation($request);

        //dd($request->all());
        $producttype-> name =  $request->input('name');
        $producttype-> description =  $request->input('description');
        $producttype-> save(); //update


        $notification ='The product has been updated.';
        return redirect('/producttypes')->with(compact('notification'));
    }

    public function destroy(ProductType $producttype){
        $delateName= $producttype->name;
        $producttype->delete();
        $notification ='The product '.$delateName.' has been removed.';
        return redirect('/producttypes')->with(compact('notification'));
    }
    
}
