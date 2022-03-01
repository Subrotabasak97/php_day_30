<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public $product;
    public function index()
    {
        return view('product.add');
    }

    public function store(Request $request)
    {
        Product::newProduct($request);
        return redirect()->back()->with('message','Product info save successfully');

    }

    public function show()
    {
        $this->product = Product::orderBy('id','desc')->get();

        return view('product.manage',['products'=>$this->product]);
    }

    public function edit($id)
    {
        $this->product = Product::find($id);
        return view('product.edit',['product'=>$this->product]);

    }

    public function update(Request $request,$id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('message', 'Product info update successfully');

    }
    public function destroy($id)
    {

        Product::deleteProduct($id);
        return redirect('/manage-product')->with('message','Product Deleted successfully');

    }
}
