<?php

namespace App\Services\Dashboard;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\RepositoryInterface;
use App\Utils\imageUpload;
use Yajra\DataTables\Facades\DataTables;

class CategoryServices
{
    private $repo ; 
    public function __construct(CategoryRepository $categoryRepository){
        $this->repo = $categoryRepository ;
    }
    public function dataTable()
    {
        $query = $this->repo->baseQuery('parent',true);
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return $btn = '
                <a href = "' . Route('dashboard.categories.edit', $row->id) . '"  class="edit btn-btn success btn-sm" >
                    <i class="fa fa-edit" ></i>
                </a>
                <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletemodal" > 
                    <i class="fafa-trash" ></i>
                </a>
            ';
            })
            ->addColumn('parent', function ($row) {
                if ($row->parent) {
                    return $row->parent->name;
                }
                return "قسم رئيسى";
                // return ($row->parent == 0) ? 'قسم رئيسى' : $row->parent->name;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset($row->image) . '" width="100" height="100" >';
            })
            ->rawColumns(['action', 'parent', 'image'])
            ->make(true);
    }
    public function getMainCategory()
    {
        return $this->repo->repoGetMainCategories();
    }
    public function StoreCategories($request)
    {
        $request['parent_id'] = $request['parent_id'] ?? 0;
        if (isset($request['image'])) {
            // $request->image = imageUpload::uploadImage($request->image);
            $request['image'] = ImageUpload::uploadImage($request['image']);
        }
        return $this->repo->Store($request);
    }
    public function getById($id, $childrenCount = false)
    {
        return $this->repo->getById($id , $childrenCount);
    }
    public function Update($request , $id){
        $request['parent_id'] = $request['parent_id'] ?? 0 ;
        if(isset($request['image'])){
            $request['image'] = imageUpload::uploadImage($request['image']);
        }
        return $this->repo->Update($request , $id);
    }
    public function Delete($request) {
       return $this->repo->Delete($request);
    }
    public function getAll() {
        return $this->repo->getAll();
    }
}
