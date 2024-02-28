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
    
    public function getAllProducts()
    {   
        return $this->sale->all();
    }

    public function getSaleById($saleId)
    {
        //Implement...
    }

    public function createSale(array $saleDetails)
    {
        //Implement...
    }

    public function cancelOrder($saleId)
    {
        //Implement...
    }
}