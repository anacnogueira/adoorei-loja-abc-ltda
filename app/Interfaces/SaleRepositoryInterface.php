<?php 

namespace App\Interfaces;

 interface SaleRepositoryInterface
 {
    public function getAllSales();
    public function getSaleById($saleId);
    public function createSale(array $saleDetails);
    public function cancelOrder($saleId);
 }