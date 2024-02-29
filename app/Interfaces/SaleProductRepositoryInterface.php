<?php 

namespace App\Interfaces;

 interface SaleProductRepositoryInterface
 {
   public function addProduct($saleId, array $saleDetails);
 }