<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('products.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,svg,gif|max:2048',

           
        ]);

        $input = $request->all();


        if($image =$request->file('image')){
            $path ='img/';
            $ProductImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($path,$ProductImage);

            $input['image']="$ProductImage";
        }

        Product::create($input);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,svg,gif|max:2048',

           
        ]);

        $input = $request->all();


        if($image =$request->file('image')){
            $path ='img/';
            $ProductImage = date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image->move($path,$ProductImage);

            $input['image']="$ProductImage";
        }

        $product->update($input);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
