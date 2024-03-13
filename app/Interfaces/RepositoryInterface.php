<?php
namespace App\Interfaces;
interface RepositoryInterface{
    public function baseQuery();
    public function Store($request);
    public function Update($id , $request);
    public function Delete($id);
    public function getById($id, $childrenCount);
}