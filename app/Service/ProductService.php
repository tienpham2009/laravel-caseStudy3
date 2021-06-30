<?php


namespace App\Service;


use App\Models\Product;
use App\Repository\Extend\ProductRepository;
use Carbon\Carbon;

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
        $file = $request->image;
        if (!$request->hasFile('image')) {
            $product->image = $file;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = Carbon::now()->format("Y-m-d H:i:s");
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
        $file = $request->image;
        if (!$request->hasFile('image')) {
            $product->image = $oldFile;
        } else {
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = Carbon::now()->format("Y-m-d H:i:s");
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
}
