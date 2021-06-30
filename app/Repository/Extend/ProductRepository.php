<?php


namespace App\Repository\Extend;


use App\Models\Product;
use App\Repository\Repository;

class ProductRepository extends Repository
{
    public function getModel()
    {
       return Product::class;
    }


}
