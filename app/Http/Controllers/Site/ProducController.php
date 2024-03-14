<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Site\ProductServices;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Collection;
class ProducController extends Controller
{
    private $services;
    public function __construct(ProductServices $productServices)
    {
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
        $products = Product::all();
        return view('Site.Products.index', compact('products'));
    }
    // public function price(Request $request)
    // {
    //     $inputprice = $request->checkedValuesPrice ;
    //     $inputcolor = $request->checkedValuesColor;
    //     // $prices = [];
    //     // $arr = [];
    //     if( $inputcolor !== null ){ 
    //         foreach ($inputcolor as $key => $value) {
    //            $arr = Product::where('color', 'like', '%' . $value . '%')->get();
    //         }
    //     }
    //     if(in_array("allprice" , $inputprice))
    //     { 
    //             $allprice = Product::get() ;
    //             if (isset($arr)) {return array_intersect($allprice, $arr);}
    //             return $allprice;
    //     }
    //     foreach ($inputprice as $price) {
    //         $prices = explode('_', $price);
    //         // $prices[] = array_map('intval', $parts);
    //     }
    //         $min = min($prices);
    //         $max = max($prices);
    //         $prices = Product::whereBetween('discount_price', [$min, $max])->get();
    //         if($arr !== null) {return array_intersect($prices, $arr);}
    //         return $prices;
    // }


    // public function price(Request $request)
    // {
    //     $inputPrices = $request->checkedValuesPrice;
    //     $inputColors = $request->checkedValuesColor;
    //     $inputSizes = $request->checkedValuesSize;
    //     $filteredProductsByPrice = Product::query();
    //     $filteredProductsByColor = Product::query();
    //     $filteredProductsBySize = Product::query();

    //     // Filter by color
    //     if (!empty($inputColors)) {
    //         foreach ($inputColors as $color) {
    //             $filteredProductsByColor->orWhere('color', 'like', '%' . $color . '%');
    //         }
    //     }

    //     // Filter by size
    //     if (!empty($inputColors)) {
    //         foreach ($inputSizes as $size) {
    //             $filteredProductsBySize->orWhere('size', 'like', '%' . $size . '%');
    //         }
    //     }

    //     // Filter by price
    //     if (!in_array("allprice", $inputPrices)) {
    //         foreach ($inputPrices as $price) {
    //             $range = explode('_', $price);
    //             $min = min($range);
    //             $max = max($range);
    //             $filteredProductsByPrice->orWhereBetween('discount_price', [$min, $max]);
    //         }
    //     }

    //     // Get the collections of products
    //     $productsByPrice = $filteredProductsByPrice->get(['id','name','color','image', 'discount_price']);
    //     $productsByColor = $filteredProductsByColor->get(['id', 'name', 'color', 'image', 'discount_price']);
    //     $productsBySize = $filteredProductsBySize->get(['id', 'name', 'color', 'image', 'discount_price']);

    //     // Return the intersection between products filtered by price and color
    //     return $productsByPrice->intersect($productsByColor);
    // }

    // public function price(Request $request)
    // {
    //     $inputPrices = $request->checkedValuesPrice;
    //     $inputColors = $request->checkedValuesColor;
    //     $inputSizes = $request->checkedValuesSize;

    //     $filteredProductsByPrice = Product::query();
    //     $filteredProductsByColor = Product::query();
    //     $filteredProductsBySize = Product::query();

    //     // Filter by color
    //     if (!empty($inputColors)) {
    //         foreach ($inputColors as $color) {
    //             $filteredProductsByColor->orWhere('color', 'like', '%' . $color . '%');
    //         }
    //     }

    //     // Filter by price
    //     if (!in_array("allprice", $inputPrices)) {
    //         foreach ($inputPrices as $price) {
    //             $range = explode('_', $price);
    //             $min = min($range);
    //             $max = max($range);
    //             $filteredProductsByPrice->orWhereBetween('discount_price', [$min, $max]);
    //         }
    //     }

    //     // Filter by size
    //     if (!empty($inputSizes)) {
    //         foreach ($inputSizes as $size) {
    //             $filteredProductsBySize->orWhere('size', 'like', '%' . $size . '%');
    //         }
    //     }

    //     // Get the collections of products
    //     // $productsByPrice = $filteredProductsByPrice->get(['id', 'name', 'color', 'image', 'discount_price','size']);
    //     // $productsByColor = $filteredProductsByColor->get(['id', 'name', 'color', 'image','discount_price', 'size']);
    //     // $productsBySize = $filteredProductsBySize->get(['id', 'name', 'color', 'image','discount_price', 'size']);
    //     $productsByPrice = $filteredProductsByPrice->get();
    //     $productsByColor = $filteredProductsByColor->get();
    //     $productsBySize = $filteredProductsBySize->get();
    //     // Find the intersection between products filtered by price, color, and size
    //     $intersection = $productsByPrice->intersect($productsByColor)->intersect($productsBySize);

    //     return $intersection;
    // }
    public function price(Request $request)
    {
        $inputPrices = $request->checkedValuesPrice;
        $inputColors = $request->checkedValuesColor;
        $inputSizes = $request->checkedValuesSize;
        // $inputCats = $request->checkedValuesCat;

        $filteredProductsByPrice = Product::query();
        $filteredProductsByColor = Product::query();
        $filteredProductsBySize = Product::query();
        // $filteredProductsByCat = Product::query();

        // Filter by color
        if (!empty($inputColors)) {
            foreach ($inputColors as $color) {
                $filteredProductsByColor->orWhere('color', 'like', '%' . $color . '%');
            }
        }

        // Filter by price
        if (!in_array("allprice", $inputPrices)) {
            foreach ($inputPrices as $price) {
                $range = explode('_', $price);
                $min = min($range);
                $max = max($range);
                $filteredProductsByPrice->orWhereBetween('discount_price', [$min, $max]);
            }
        }

        // Filter by size
        if (!empty($inputSizes)) {
            foreach ($inputSizes as $size) {
                $filteredProductsBySize->orWhere('size', $size);
            }
        }

        // // Filter by category
        // if (!empty($inputCats)) {
        //     foreach ($inputCats as $cat) {
        //         $filteredProductsByCat->orWhere('category_id', $cat);
        //     }
        // }

        // Get the collections of products
        $productsByPrice = $filteredProductsByPrice->get();
        $productsByColor = $filteredProductsByColor->get();
        $productsBySize = $filteredProductsBySize->get();
        // $productsByCat = $filteredProductsByCat->get();

        // Find the intersection between products filtered by price, color, size, and category
        $intersection = $productsByPrice->intersect($productsByColor)
            ->intersect($productsBySize);
            // ->intersect($productsByCat);

        return $intersection;
    }
    public function getAll(Request $request)
    {
        // $posts = Product::all();
        // // dd($posts);
        // return response()->json($posts);
        $query = Product::query();
        $filteredProducts = $query->get();
        return response()->json($filteredProducts);
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
