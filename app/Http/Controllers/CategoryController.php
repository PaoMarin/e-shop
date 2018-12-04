<?php

use App\Category;
namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {    
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('categories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_categories()
    {    
       
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('categories')->with('categories', $categories);
    }

    public function getProducts($id)
    {    
        $products = DB::table('categories')->join('products', function ($join) use ($id){ $join->on('categories.id', '=', 'products.id_category') ->where('categories.id', '=', $id); }) 
        ->get();
        //dd($products);
        return view('view_products')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('create_categories')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $c = new Category;
        $c->description = $request->description;
        $c->father_category = $request->father_category;
        if ($c->save()) {
          return redirect()->action('CategoryController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function show($id)
    {
       $categories = Category::find($id);
       return view('categories')->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *  In this case is used to update the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        //$categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('edit_categories',compact('category'));
    }

    public function update(Request $request, $id){
        DB::table('categories')->where('id', $id)->update(['description' => $request->description, 'father_category' => $request->father_category]);
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('categories')->with('categories', $categories);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('success','Categoria eliminado satisfactoriamente');
    }
}
