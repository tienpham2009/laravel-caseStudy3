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

    public function sort($sort)
    {
        return $this->model->orderBy('unit_price' , $sort)->get();
    }

    public function search($text)
    {
        return $this->model->select('name')
                            ->where("name" , "LIKE" , '%'.$text.'%')->get();
    }

    public function searchByName($text)
    {
        return $this->model->where("name" , $text)->get();
    }

}
