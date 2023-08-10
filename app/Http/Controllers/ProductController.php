<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index(){

    return view('products.index',['products'=>Product::latest()->get()]);
  }
  public function create(){
    return view('products.creat');
  }

  public function store( Request $request){
    //validate
    $request->validate([
      'name' => 'required',
      'discription' => 'required',
      'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',



    ]);
    //image upload
    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('products'), $imageName);

  $product = new Product;
  $product->image = $imageName;
  $product->name = $request->name;
  $product->discription = $request->discription;


  $product->save();
  return back()->withSuccess('Product Created !!!!!');
  }
  public function edit($id){
    $product = Product::where('id',$id)->first();
    return view('products.edit',['product' => $product]);
  }
  public function update(Request $request, $id){
    $request->validate([
        'name' => 'required',
        'discription' => 'required',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',


    ]);
    $product = Product::where('id',$id)->first();
      if(isset($request->image)){
      //image upload
      $imageName = time().'.'.$request->image->extension();
      $request->image->move(public_path('products'), $imageName);
      $product->image = $imageName;
      }

    $product->name = $request->name;
    $product->discription = $request->discription;


    $product->save();
    return back()->withSuccess('Product Updated !!!!!');


  }
  public function destroy($id){
    $product = Product::where('id',$id)->first();
    $product->delete();
    return back()->withSuccess('Product Deleted !!!!!');


  }

  public function show($id){
    $product = Product::where('id',$id)->first();

    return view('products.show',['product'=>$product]);


  }
}


