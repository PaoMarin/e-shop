<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::orderBy('id','DESC');
        return view('product.index',compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'sku'=>'required','name'=>'required','description'=>'required', 'imagen'=>'required', 'stock'=>'required', 'precio'=>'required']);
        Product::create($request->all());
        return redirect()->route('product.index')->with('success','Producto creado satisfactoriamente');
    }

    public function getProducts($id)
    {    
        $products = DB::table('categories')->join('products', function ($join) use ($id){ $join->on('categories.id', '=', 'products.id_category') ->where('categories.id', '=', $id); }) 
        ->get();
        //dd($products);
        return view('products')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products=Product::find($id);
        return  view('product.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $products=Product::find($id);
        return view('product.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)    {
        //
        $this->validate($request,['sku'=>'required','name'=>'required','description'=>'required', 'imagen'=>'required', 'stock'=>'required', 'precio'=>'required']);

        Product::find($id)->update($request->all());
        return redirect()->route('product.index')->with('success','Producto actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Product::find($id)->delete();
        return redirect()->route('product.index')->with('success','Producto eliminado satisfactoriamente');
    }
}
