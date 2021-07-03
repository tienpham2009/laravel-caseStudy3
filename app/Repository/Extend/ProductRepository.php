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

    public function getByCate($category_id)
    {
       return $this->model->where('category_id' , $category_id)->get();
    }

    public function filterPrice($priceSmall , $priceBig)
    {
        return $this->model->whereBetween('unit_price' , [$priceSmall , $priceBig])->get();
    }


}
