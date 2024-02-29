<?php

namespace App\Repositories;

use App\Interfaces\SaleProductRepositoryInterface;
use App\Models\Sale;

class SaleProductRepository implements SaleProductRepositoryInterface
{
    protected $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }  

    public function addProduct($saleId, array $saleDetails)
    {
        $sale = $this->sale->findOrFail($saleId);

        $sale->saleProduct()->createMany($saleDetails['items']);

        return $sale;
    }

}