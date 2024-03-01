<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Resources\SaleResource;

class SaleProductController extends Controller
{
    private SaleProductRepositoryInterface $saleProductRepository;

    public function __construct(SaleProductRepositoryInterface $saleProductRepository)
    {
        $this->saleProductRepository = $saleProductRepository;
    }

    public function store(StoreSaleRequest $request): JsonResponse 
    {
                      
        $saleId = $request->route('id');
        
        $saleDetails['items'] = $request->items;
  
        return response()->json(
            [
                'data' => new SaleResource($this->saleProductRepository->addProduct($saleId, $saleDetails))
            ],
            Response::HTTP_CREATED
        );
    }
}
