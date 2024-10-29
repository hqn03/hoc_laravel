<?php

namespace App\Services;
use App\Models\Product;
use Exception;
use Log;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use SebastianBergmann\CodeCoverage\FileCouldNotBeWrittenException;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getList()
    {
        return $this->product->get();
    }

    public function update($product, $params){
        return $product->update($params);
    }

    public function store($params){
        try{
            return $this->product->create($params);
        }catch(Exception $exception){
            Log::error($exception);
        }
    }

    public function delete($product){
        return $product->delete();
    }

    public function listTrash(){
        return $this->product->get()::withTrash();
    }

    public function restore($product){
        return $product->restore();
    }
}
