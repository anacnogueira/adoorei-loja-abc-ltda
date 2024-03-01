<?php


namespace App\Services;


use App\Interfaces\ProductRepositoryInterface;

class GetAmountFromSale
{
    
    private ProductRepositoryInterface $productRepository;
    
    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }    
    
    public function sum($items)
    {
        $amount = 0;       

        foreach($items as $item) {
            $product = $this->productRepository->getProductById($item['product_id']);
            
            if ($product) {
                $amount += $product->price * $item['amount'];
            }
        }


        return $amount;
    }

}