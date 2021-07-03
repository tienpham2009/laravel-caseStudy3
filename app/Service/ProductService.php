<?php


namespace App\Service;


use App\Models\Category;
use App\Models\Product;
use App\Repository\Extend\ProductRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function store($request)
    {
        $product  = new Product();
        $product->fill($request->all());

        $category = new Category();
        if ($request->new_category != null){
            $category->name = $request->new_category;
            $category->save();
        }
        $product->category_id = $category->max('id');

        $file = $request->image;
        if (!$request->hasFile('image')) {
            $product->image = asset('storage/productImage/default.jpg');
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = Carbon::now()->format("Y-m-d H:i:s");
            $fileName = str_replace(' ','-',$fileName);
            $newFileName = "$fileName.$fileExtension";

            $request->file("image")->storeAs('public/productImage', $newFileName);
            $product->image = $newFileName;

        }
        $expiry_date = $request->expiry_date;
        $product->input_date = date("Y-m-d");
        $product->expiration_date = date('Y-m-d', strtotime("+".$expiry_date." day"));
        $this->productRepository->create($product);
    }

    public function getById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($request , $id)
    {

        $product = $this->productRepository->findById($id);
        $oldFile = $product->image;
        $product->fill($request->all());

        $category = new Category();
        if ($request->new_category != null){
            $category->name = $request->new_category;
            $category->save();
        }
        $product->category_id = $category->max('id');

        $file = $request->image;
        if (!$request->hasFile('image')) {
            $product->image = $oldFile;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = Carbon::now()->format("Y-m-d H:i:s");
            $fileName = str_replace(' ','-',$fileName);
            $newFileName = "$fileName.$fileExtension";

            $request->file("image")->storeAs('public/productImage', $newFileName);
            $product->image = $newFileName;
        }
        $this->productRepository->update($product);

    }

    public function destroy($data)
    {
        $this->productRepository->destroy($data);
    }

    public function getCategory()
    {
        return Category::all();
    }

    public function getByCate($category_id)
    {
        return $this->productRepository->getByCate($category_id);
    }

    public function filterPrice($prices)
    {
        $priceSmall = $prices[0];
        $pricesBig = $prices[1];

        return $this->productRepository->filterPrice($priceSmall , $pricesBig);
    }
}
