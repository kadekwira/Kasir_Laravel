<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService{

    // Write something awesome :)
    public function getAll(array $search,array $request);
    public function getSingle($id);
    public function store($data);
    public function update($id,$data);
    public function delete($id);
    public function handleImage($data,$type);
}
