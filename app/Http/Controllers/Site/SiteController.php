<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Services\Site\ProductServices;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    private $services;
    public function __construct(ProductServices $productServices)  {
        $this->services = $productServices;
    }
    public function index()
    {
        // $mainCategories = $this->var;
        $recentProducts = $this->services->getProductsRecentlly();
        // dd($mainCategories);
        return view('Site.index',compact('recentProducts'));
        // $r = Product::all();
        // // dd($r);
        // foreach ($r as $key => $v) {
        //         $v->image = "51876c09-8386-45d1-8e4b-3803073c731c1710287935.jpg" ;
        //         $v->update();
        // }
        // // dd($r);

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
