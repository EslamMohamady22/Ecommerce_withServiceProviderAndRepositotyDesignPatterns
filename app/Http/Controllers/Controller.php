<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    // public $repo ;
    // public $var;
    // use AuthorizesRequests, ValidatesRequests;
    // public function __construct(CategoryRepository $categoryRepository) {
    //     $this->repo = $categoryRepository;
    //     $this->var = $this->repo->repoGetMainCategories('c');
    //     // $this->var = Category::where('parent_id' , 0)->with('child')->get();
    //     dd($this->var);
    //     View::share('mainCategories' , $this->var);

    // }
}
