<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Product\CreateRequest;
use App\Http\Requests\Web\Product\UpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(){
        $products = Product::get();
        return view('products.list',["products"=>$products]);
    }

    public function show(Product $product){
        return view('products.show',['product'=>$product]);
    }

    public function edit(Product $product){
        return view('products.edit', ["product"=>$product]);
    }

    public function update(UpdateRequest $updateRequest, Product $product){
        $request = $updateRequest->validated();
        $result = $this->productService->update($product, $request);

        if($result){
            return redirect()->route('products.index')->with('success','update success');
        }

        return redirect()->route('products.index')->with('error', 'update failed');
    }

    // public function create(){
    //     return view('products.create');
    // }

    // public function store(CreateRequest $createRequest){
    //     $request = $createRequest->validated();
    //     $result = $this->productService->store($request);
    //     if($result){
    //         return redirect()->route('products.index')->with('success','create success');
    //     }
    //     return redirect()->route('products.index')->with('error', 'update failed');
    // }

}
