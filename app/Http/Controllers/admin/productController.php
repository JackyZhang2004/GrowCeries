<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\productDetail;
use App\Models\User;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('admin.products.index', compact('products'));
    }

    public function addProduct()
    {
        return view('admin.products.addProduct');
    }

    public function show(product $product){
        return view('admin.products.showProduct', compact('product'));
    }

    public function store()
    {
        $validator = request()->validate([
            'productName' => 'required',
            'productPrice' => 'required|numeric',
            'stock' => 'required|numeric',
            'variant' => 'required|numeric',
            'calories' => 'required|numeric',
            'fat' => 'required|numeric',
            'sugar' => 'required|numeric',
            'carbohydrate' => 'required|numeric',
            'protein' => 'required|numeric',
            'shelfLife' => 'required',
            'productCategory' => 'required',
            'productDesc' => 'required',
        ]);


        // First, check if a product detail with the same name already exists
        $productDetail = productDetail::where('productName', request()->get('productName', ''))->first();

        if (!$productDetail) {
            // If product detail doesn't exist, create a new one
            $productDetail = ProductDetail::create([
                'productName' => request()->get('productName', ''), // Assuming the input for the product name is 'product_name'
                'calories' => request()->get('calories', null), // Assuming the input for calories
                'fat' => request()->get('fat', null), // Assuming the input for fat
                'sugar' => request()->get('sugar', null), // Assuming the input for sugar
                'carbohydrate' => request()->get('carbohydrate', null), // Assuming the input for carbohydrate
                'protein' => request()->get('protein', null), // Assuming the input for protein
                'shelfLife' => request()->get('shelfLife', null), // Assuming the input for shelf life
                'productCategory' => request()->get('productCategory', null), // Assuming the input for shelf life
                'productDesc' => request()->get('productDesc', null), // Assuming the input for shelf life
            ]);

            // Save the product detail
            $productDetail->save();
        }

        // Create a new product with the provided variant and link it to the product detail
        $product = product::create([
            'productDetailId' => $productDetail->productDetailId,
            'productPrice' => request()->get('productPrice', ''), // Assuming the input for the variant is 'product'
            'stock' => request()->get('stock', ''), // Assuming the input for the variant is 'product'
            'variant' => request()->get('variant', '') // Assuming the input for the variant is 'product'
        ]);

        $product->save();

        return redirect()->route('admin.products');

    }

    public function destroy(product $product){
       $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    public function edit(product $product){
        $editing = true;
        return view('admin.products.showProduct', compact('product', 'editing'));
    }

    public function update(product $product){

        $validator = request()->validate([
            'productName' => 'required',
            'productPrice' => 'required|numeric',
            'stock' => 'required|numeric',
            'variant' => 'required|numeric',
            // 'calories' => 'required|numeric',
            // 'fat' => 'required|numeric',
            // 'sugar' => 'required|numeric',
            // 'carbohydrate' => 'required|numeric',
            // 'protein' => 'required|numeric',
            // 'shelfLife' => 'required',
            // 'productCategory' => 'required',
            // 'productDesc' => 'required',
        ]);

        $productDetail = $product->productDetail;
        $productDetail->productName = request()->get('productName', '');
        $productDetail->save();

        $product->productPrice = request()->get('productPrice', '');
        $product->stock = request()->get('stock', '');
        $product->variant = request()->get('variant', '');
        $product->save();

        return redirect()->route('admin.products', $product->productId)->with('success', 'idea updated successfully!');
    }

}
