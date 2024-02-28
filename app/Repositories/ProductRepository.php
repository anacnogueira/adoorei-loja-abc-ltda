<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }    
    
    public function getAllProducts()
    {   
        $this->product->all();
    }
}