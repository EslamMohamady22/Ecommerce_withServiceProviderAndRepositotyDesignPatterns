<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Products\ProductDeleteRequest;
use App\Http\Requests\Dashboard\Products\ProductStoreRequest;
use App\Http\Requests\Dashboard\Products\ProductUpdateRequest;
use App\Models\Category;
use App\Services\Dashboard\CategoryServices;
use App\Services\Dashboard\ProductServices;
use Illuminate\Http\Request;

class ProducController extends Controller
{
    private $productServices , $categoryServices;

    public function __construct(ProductServices $productServices , CategoryServices $categoryServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
    }
    public function index()
    {
        return view('dashboard.Products.index');
    }
    public function getAll()
    {
        return $this->productServices->dataTable();
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.Products.create', compact('categories'));
    }
    public function store(ProductStoreRequest $request)
    {
        // dd($request->all());
        $this->productServices->StoreProducts($request->validated());
        return back();
    }
    public function deleteImages($id)
    {
        $this->productServices->deleteImages($id);
        return redirect()->back();
    }
    public function edit($id)
    {
        $product = $this->productServices->getById($id , true);
        $categories = $this->categoryServices->getAll();
        return view('dashboard.Products.edit',compact('product', 'categories'));
    }
    public function update(ProductUpdateRequest $request, $id)
    {
        // dd($request->validated());
        $this->productServices->UpdateProduct($request->validated() , $id);
        return back();
    }
    public function destroy(string $id)
    {
        //
    }
    public function delete(ProductDeleteRequest $request)
    {
         $this->productServices->DeleteProduct($request->id);
         return back();
    }
}
