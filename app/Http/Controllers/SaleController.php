<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Services\GetAmountFromSale;

class SaleController extends Controller
{
    private SaleRepositoryInterface $saleRepository;

    public function __construct(
        SaleRepositoryInterface $saleRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->saleRepository = $saleRepository;
        $this->productRepository = $productRepository;
       
    }

    public function index()
    {
        return response()->json([
            'data' => $this->saleRepository->getAllSales()
        ]);
    }

    public function store(StoreSaleRequest $request): JsonResponse 
    {                      
        $saleDetails = [];
        $saleDetails['items'] = $request->items; 
        $saleDetails['amount'] = (new GetAmountFromSale($this->productRepository))
            ->sum($saleDetails['items']);
       
        return response()->json(
            [
                'data' => $this->saleRepository->createSale($saleDetails)
            ],
            Response::HTTP_CREATED
        );
    }


    public function show(Request $request): JsonResponse 
    {
        $saleId = $request->route('id');

        return response()->json([
            'data' => $this->saleRepository->getSaleById($saleId)
        ]);
    }

    public function destroy(Request $request)
    {
        $saleId = $request->route('id');
        $this->saleRepository->deleteSale($saleId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
    
}
