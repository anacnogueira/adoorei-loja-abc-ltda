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
        return $this->sale->all();
    }

    public function getSaleById($saleId)
    {
        return $this->sale->findOrFail($saleId);
    }

    public function createSale(array $saleDetails)
    {
        $sale = $this->sale->create($saleDetails);

        $sale->saleProduct()->createMany($saleDetails['items']); //Erro: resolver

        return $sale;
    }

    public function deleteSale($saleId)
    {
        //Implement...
    }
}