<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        $productList = Product::limit(10)->orderBy('id','desc')->get();
        return view('.product.index', [
            'misProductos' => $productList
        ]);
    }
    public function create(){

        $categoryList= Category::all();
        return view('product.create',[
            'categoryList'=> $categoryList
        ]);
    }

    public function store(Request $request){
        //dd($request->all());

        $newProduct = new Product();
        $newProduct->name= $request->get('nombre');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('category');
        $newProduct->description = $request->get('descripcion');
        
        if($request->hasFile('imagen')){
            $ruta=$request->file('imagen')->store('images','public');
            
            $newProduct->image=$ruta;
        }

        $newProduct->save();

        return redirect()->route('product.index');

    }
    public function show($producto){
        return view('.product.show');
    }

}




