<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illumkinate\Http\Respose;
use App\Http\Requests\StoreSaleRequest;

class SaleController extends Controller
{
    private SaleRepositoryInterface $saleRepository;
    private ProductRepositoryInterface $productRepository;

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
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)//: JsonResponse 
    {
                      
        $saleDetails = [];
        $saleDetails['amount'] = 0;
        $saleDetails['items'] = $request->items; 

        foreach($request->items as $item) {
            $product = $this->productRepository->getProductById($item['product_id']);
            
            if ($product) {
                $saleDetails['amount'] += $product->price * $item['amount'];
            }
        }


        return response()->json(
            [
                'data' => $this->saleRepository->createSale($saleDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }
    
}
