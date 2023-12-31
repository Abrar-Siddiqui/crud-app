<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(2);
        return view('product.Home',['product'=> $products]);
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "description"=>"required",
            "image"=>"required|mimes:png,jpg,jpeg,gif|max:10000"

        ]);
        $imageName  = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
        
        $products = new Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->image = $imageName;

        $products->save();

        return back()->withSuccess('Product Created !!!');
    }
    public function edit($id){
        $products = Product::where('id',$id)->first();
        // dd($products);
        return view('product.Edit',['product'=>$products]);
    }
    public function Update(Request $request, $id){
        //Validation 
        $request->validate([
            'name'=> "required",
            "description" =>"required",
            "image"=>"nullable|mimes:jpg,jpeg,gif,png|max:10000",
        ]);
        $product = Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName  = time().'.'.$request->image->extension();
            $request->image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Updates !!!');
    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!');
    }
}
