<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();

        if ($products->isEmpty()) {
            return view('product.index', ['message' => 'No products found.']);
        }
        $user = Auth::user();
        return view('product.index', ['products' => $products, 'user' => $user->name]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($user=Auth::user()){
            
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $request->merge(['user_id' => $user->id]);
        

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }else{
            return redirect()->route('login');
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('product.productElement',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function delete_All()
    {
        Product::truncate();
        return redirect()->route('products.index')->with('success', 'All products deleted successfully.');
    }

    public function get_elementsById($id){
        $product=Product::find($id);
        
        if (!$product){
            return view('product.productElement',['message'=>'Pas de product']);
        }
        return view('product.productElement',['product'=>$product]);
    }

}
