<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Product;
use App\Models\ProductImage;
use App\Utils\imageUpload;
use Illuminate\Support\Facades\DB;

class ProductRepository implements RepositoryInterface
{
    private $product , $pImg;
    public function __construct(Product $product , ProductImage $productImage)
    {
        $this->product = $product;
        $this->pImg = $productImage;

    }
    public function baseQuery()
    {
        $query = $this->product->select('*');
        // ->with($relations);
        // foreach ($withCount as $key => $value) {
        //     $query->withCount($value);
        // }
        return $query->get();
    }
    public function Store($request)
    {
        $img = $request;
        unset($request['images']);
        $product = $this->product->create($request);
        $manyImages = $this->uploadMultibleImages($product->id, $img);
        $product->images()->createMany($manyImages);
        return $product ;
    }
    public function uploadMultibleImages($id, $request)
    {
        $images = [];
        if (isset($request['images'])) {
            $i = 0;
            foreach ($request['images'] as $key => $value) {
                $images[$i]['image'] = ImageUpload::uploadImage($value);
                $images[$i]['product_id'] = $id;
                $i++;
            }
        }
        return $images;
    }
    public function Update($id, $request)
    {
        $product = $this->getById($id, true);
        $manyImages = $this->uploadMultibleImages($id, $request);
        $product->images()->createMany($manyImages);
        unset($request['images']);
        return $product->update($request);
    }
    public function Delete($id)
    {
        $product = $this->getById($id,true);
        return $product->delete();
    }
    public function deleteImages($id)
    {
        return $this->pImg->findOrFail($id)->delete();
    }
    public function getById($id, $children)
    {
        $query = $this->product->where('id', $id);
        if ($children) {
            $query->with('category');
        }
        return $query->firstOrFail();
    }
    // public function addColor($product, $request)
    // {
    //    $product->productcolor()->createMany($request['colors']);

    // }

    public function userGetRecentProducts() {
        return $this->product->latest('created_at')->paginate(10)->items();
    }
}
