<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Category\CategoryDeleteRequest;
use App\Http\Requests\Dashboard\Category\CategoryStoreRequest;
use App\Http\Requests\Dashboard\Category\CategoryUpdateRequest;

use App\Services\Dashboard\CategoryServices;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class CategoryController extends Controller
{
    private $categoryServices ;
    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }
    public function index()
    {
        $mainCategories = $this->categoryServices->getMainCategory();
        return view('dashboard.categories.index', compact('mainCategories'));
        // $r = Category::all();
        // foreach ($r as $key => $v) {
        //     if($v->parent_id == null){
        //         $v->parent_id = 0 ;
        //         $v->update();
        //     }
        // }
    }
    public function getall()
    {
        return $this->categoryServices->dataTable();
    }
    public function delete(CategoryDeleteRequest $request) {
        $this->categoryServices->Delete($request);
        return redirect()->route('dashboard.categories.index');
    }
    public function create()
    {
        //
    }
    public function store(CategoryStoreRequest $request)
    {
        // dd($request->all());
        $this->categoryServices->StoreCategories($request->validated());
        return redirect()->route('dashboard.categories.index');
    }
    public function show($id)
    {
        //
    }
    public function edit(string $id)
    {
        $category =  $this->categoryServices->getById($id , true);
        $mainCategories = $this->categoryServices->getMainCategory();
        return view('dashboard.categories.edit',compact('category', 'mainCategories'));
        // dd($category);
    }
    public function update(CategoryUpdateRequest $request, string $id)
    {
         $this->categoryServices->Update($request->validated(),$id);
         return redirect()->back();
    }
    public function destroy(string $id)
    {
        //
    }
}
