<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        return view('admin.products.show', compact('products'));
    }

    public function create()
    {
        $categories = $this->productService->getCategory();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $productRequest)
    {
        $this->productService->store($productRequest);
        return redirect()->route('Product.show');
    }

    public function detail($id)
    {
        $product = $this->productService->getById($id);
        return view('admin.products.detail', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productService->getById($id);
        $categories = $this->productService->getCategory();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $productRequest, $id)
    {
        $this->productService->update($productRequest, $id);
        return redirect()->route('Product.show');

    }

    public function delete(Request $request)
    {
        $ids = $request->id;
        $this->productService->destroy($ids);

    }

    public function user()
    {
        $products = $this->productService->getAll();
        $data = [
            'status' => 'success',
            'data' => $products
        ];
        return response()->json($data);


    }

    public function filterByCate(Request $request)
    {
        $category_id = $request->category_id;
        $products = $this->productService->getByCate($category_id);
        $data = [
            'status' => 'success',
            'data' => $products
        ];

        return response()->json($data);

    }

    public function show()
    {
        $products = $this->productService->getAll();
        $categories = Category::all();
        return view('index', compact('products' , 'categories'));
    }

    public function filterPrice(Request $request)
    {
        $prices = $request->prices;
        $products = $this->productService->filterPrice($prices);
        $data = [
            'status' => 'success',
            'data' => $products
        ];
        return response()->json($data);
    }

    public function detailProduct($id)
    {
        $product = $this->productService->getById($id);
        return view('user.detail', compact('product'));
    }

    public function sort(Request $request)
    {
        $sort = $request->sort;

        $products = $this->productService->sort($sort);

        $data = [
            "status"=>"success",
            "data"=>$products
        ];
        return response()->json($data);
    }

    public function search(Request $request)
    {
        $text = $request->text;
        $productName = $this->productService->search($text);
        $data = [
            "status"=>"success",
            "data"=>$productName
        ];

        return response()->json($data);
    }

    public function  searchByName(Request $request)
    {
        $text = $request->text;
        $products = $this->productService->searchByName($text);
        $data = [
            "status"=>"success",
            "data"=>$products
        ];

        return response()->json($data);
    }


}
