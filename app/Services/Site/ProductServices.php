<?php

namespace App\Services\Site;

// use App\Repositories\Site\ProductRepository;

use App\Repositories\ProductRepository;
use App\Utils\imageUpload;
use Yajra\DataTables\Facades\DataTables;

class ProductServices
{
    private $repo ;
    public function __construct(ProductRepository $productRepository) {
        $this->repo = $productRepository;
    }

    public function getById($id , $children)
    {
        return $this->repo->getById($id, $children);
    }

    public function getProductsRecentlly()
    {
        return $this->repo->userGetRecentProducts();
    }
    public function dataTable()
    {
        $query = $this->repo->baseQuery();
        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return $btn = '
                <a href="' . Route('Products.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>

                <button type="button" id="deleteBtn"  data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal"
                data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })
            ->addColumn('category', function ($row) {
                return $row->category->name;
            })
            ->addColumn(
                'colors',
                function ($row) {
                    if ($row->color) {
                        return $row->color;
                    }
                    // return ($row->parent == 0) ? 'قسم رئيسى' : $row->parent->name;
                }
            )
            ->addColumn(
                'sizes',
                function ($row) {
                    if ($row->size) {
                        return $row->size;
                    }
                    // return ($row->parent == 0) ? 'قسم رئيسى' : $row->parent->name;
                }
            )
            ->addColumn(
                'quantity',
                function ($row) {
                    if ($row->size) {
                        return $row->quantity;
                    }
                    // return ($row->parent == 0) ? 'قسم رئيسى' : $row->parent->name;
                }
            )
            ->addColumn(
                'cat_id',
                function ($row) {
                    return $row->category->id;
                    // return ($row->parent == 0) ? 'قسم رئيسى' : $row->parent->name;
                }
            )
            ->rawColumns(['action', 'colors', 'cat_id', 'sizes', 'quantity'])
            ->make(true);
    }
}
