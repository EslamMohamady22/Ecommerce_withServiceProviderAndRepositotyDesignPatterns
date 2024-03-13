<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Site\ProductServices;
use Illuminate\Http\Request;
use App\Models\Product;
class ProducController extends Controller
{
    private $services;
    public function __construct(ProductServices $productServices) {
        $this->services = $productServices;
    }
    //------------------
    // public function index()
    // {
    //     $posts = Product::all();
    //     return response()->json($posts);
    // }
    public function filter(Request $request)
    {
        $query = Product::query();
        $filteredPosts = $query->get();
        return response()->json($filteredPosts);
    }
    // public function loadData()
    // {
    //     // Simulate data loading, you can replace this with actual data retrieval logic
    //     $data = ['message' => 'Hello from server!'];

    //     return response()->json($data);
    // }
    //-----------------------

    public function index()
    {

        return view('Site.Products.index');
    }
    public function price(Request $request) {
        return $posts = Product::all();
    }
    public function getAll(Request $request)
    {
        // $posts = Product::all();
        // // dd($posts);
        // return response()->json($posts);
        $query = Product::query();
        $filteredPosts = $query->get();
        return response()->json($filteredPosts);
    }
    public function getfilter()
    {
        // return $this->services->dataTable();
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
