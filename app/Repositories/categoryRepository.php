<?php
namespace App\Repositories ;

use App\Interfaces\RepositoryInterface;
use App\Models\Category;


class CategoryRepository implements RepositoryInterface {
    private $category ;
    public function __construct(Category $category) {
        $this->category =  $category ;
    }
    public function baseQuery($relations , $withCount) {
        return $this->category->select('*')->with($relations);
    }    
    public function repoGetMainCategories($query = null)  {
        if($query == 'c')
        {
            return Category::get();
        }
        else
        {
            return Category::where('parent_id', 0)->get();
        }
    }
    public function Store($request)  {
        return Category::create($request);
    }
    public function getById($id , $childrenCount) {
        $query =  $this->category->where('id', $id);
        if ($childrenCount) {
            $query->withCount('child');
        }
        return $query->firstOrFail();
    }
    public function Update($request , $id)
    {
        return $this->getById($id , true)->update($request);
    }
    public function Delete($request) {
        return $this->category->whereId($request->id)->delete();
    }
    public function getAll() {
        return $this->category->select('*')->get();
    }
    
}
