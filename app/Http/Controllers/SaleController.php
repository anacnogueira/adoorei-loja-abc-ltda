<?php

namespace App\Http\Controllers;

use App\Interfaces\SaleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illumkinate\Http\Respose;
use App\Http\Requests\StoreSaleRequest;

class SaleController extends Controller
{
    private SaleRepositoryInterface $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
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
    //     $saleDetails = $request->only([
    //         'products',            
    //     ]);

    //     return response()->json(
    //         [
    //             'data' => $this->saleRepository->createSale($saleDetails)
    //         ],
    //         Response::HTTP_CREATED
    //     );
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
