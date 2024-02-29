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
        //Implement...
    }

    public function createSale(array $saleDetails)
    {
        //\DB::enableQueryLog();
        $sale = $this->sale->create($saleDetails);

        $sale->saleProduct()->createMany($saleDetails['items']); //Erro: resolver
        
        //dd(\DB::getQueryLog()); 
        return $sale;
    }

    public function cancelOrder($saleId)
    {
        //Implement...
    }
}