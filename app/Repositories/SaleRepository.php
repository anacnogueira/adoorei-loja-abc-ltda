<?php

namespace App\Repositories;

use App\Interfaces\SaleRepositoryInterface;
use App\Models\Sale;

class SaleRepository implements SaleRepositoryInterface
{
    protected $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }    
    
    public function getAllSales()
    {        
        return $this->sale->with(['products'])->get();
    }

    public function getSaleById($saleId)
    {
        return $this->sale->with('products')->findOrFail($saleId);
    }

    public function createSale(array $saleDetails)
    {
        $sale = $this->sale->create($saleDetails);

        $sale->saleProduct()->createMany($saleDetails['items']);

        return $sale;
    }

    public function deleteSale($saleId)
    {
        $this->sale->destroy($saleId);
    }
}