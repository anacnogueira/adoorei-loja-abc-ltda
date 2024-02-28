<?php

namespace App\Http\Controllers;

use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illumkinate\Http\Respose;

class ProductController extends Controller
{

    private ProductRepositoryInterface $productRepository;
    
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->productRepository->gelAllProducts()
        ]);
    }

    
}
