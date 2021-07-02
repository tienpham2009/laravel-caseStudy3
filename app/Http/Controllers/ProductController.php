<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.products.show' , compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->getCategory();
        return view('admin.products.create' , compact('categories'));
    }

    public function store(ProductRequest $productRequest)
    {
        $this->productService->store($productRequest);
        return redirect()->route('Product.show');
    }

    public function detail($id)
    {
        $product = $this->productService->getById($id);
        return view('admin.products.detail' , compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productService->getById($id);
        $categories = $this->productService->getCategory();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    public function update(UpdateProductRequest $productRequest , $id)
    {
        $this->productService->update($productRequest , $id);
        return redirect()->route('Product.show');

    }

    public function delete(Request $request)
    {
        $data = $request->data;
        $this->productService->destroy($data);
        return redirect()->route('Product.show');
    }

    public function user()
    {
        $products = $this->productService->getAll();
        return view('index' , compact('products'));
    }





}
