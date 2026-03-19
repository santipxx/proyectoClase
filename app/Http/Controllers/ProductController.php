<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(){
        $productList = Product::with('category')->orderBy('id','desc')->get();
        return view('product.index', [
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
        //Validacion

        $request->validate([
            'nombre' => 'required|min:5|max:250',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'imagen'=>'required|image',
            'category'=>'required'
        ]);
        
        
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
    public function show(Product $product){
        $product->load('category');
        return view('product.show', compact('product'));
    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('product.index');
    }

}




