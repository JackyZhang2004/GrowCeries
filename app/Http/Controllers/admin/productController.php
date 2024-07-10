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
        return view('admin.products.crud', compact('products'));
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
        // $validator = request()->validate([
        //     'productName' => 'required',
        //     'productPrice' => 'required|numeric',
        //     'stock' => 'required|numeric',
        //     'variant' => 'required',
        //     'calories' => 'required|numeric',
        //     'fat' => 'required|numeric',
        //     'sugar' => 'required|numeric',
        //     'carbohydrate' => 'required|numeric',
        //     'protein' => 'required|numeric',
        //     'shelfLife' => 'required',
        //     'productCategory' => 'required',
        //     'productDesc' => 'required',
        //     'origin' => 'required'
        // ]);

        // First, check if a product detail with the same name already exists
        $productDetail = productDetail::where('productName', request()->get('productName'))->first();
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
                'origin' => request()->get('origin', null),
            ]);

            // Save the product detail
            $productDetail->save();
        }

        // Create a new product with the provided variant and link it to the product detail
        $product = product::create([
            'productDetailId' => $productDetail->productDetailId,
            'productName' => request()->get('productName', ''), // Assuming the input for the product name is 'product_name'
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
        return view('admin.products.editProduct', compact('product', 'editing'));
    }

    public function update(Request $request){
        $targetProduct = product::where('productId', $request->id)->first();
        if($request->productName != null){$targetProduct->productDetail->productName = $request->productName;}
        if($request->productName != null){$targetProduct->productName = $request->productName;}
        if($request->calories != null){$targetProduct->productDetail->calories = $request->calories;}
        if($request->fat != null){$targetProduct->productDetail->fat = $request->fat;}
        if($request->sugar != null){$targetProduct->productDetail->sugar = $request->sugar;}
        if($request->carbohydrate != null){$targetProduct->productDetail->carbohydrate = $request->carbohydrate;}
        if($request->protein != null){$targetProduct->productDetail->protein = $request->protein;}
        if($request->shelfLife != null){$targetProduct->productDetail->shelfLife = $request->shelfLife;}
        if($request->productCategory != null){$targetProduct->productDetail->productCategory = $request->productCategory;}
        if($request->productDesc != null){$targetProduct->productDetail->productDesc = $request->productDesc;}
        if($request->origin != null){$targetProduct->productDetail->origin = $request->origin;}
        if($request->productPrice != null){$targetProduct->productPrice = $request->productPrice;}
        if($request->stock != null){$targetProduct->stock = $request->stock;}
        if($request->variant != null){$targetProduct->variant = $request->variant;}
        
        $targetProduct->save();

        return redirect()->route('admin.products', $targetProduct)->with('success', 'Product updated successfully!');
    }

    public function search(){
        // dd(request());
        // dd('1');
        // dd($product);
        // $search = ProductDetail::where('productName', $product)->get();
        // dd($search);
    }

}
