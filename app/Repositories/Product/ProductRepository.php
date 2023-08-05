<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;

interface ProductRepository extends Repository{

    // Write something awesome :)
    public function getAll(array $search,array $request);
    public function getSingle($id);
    public function store($data);
    public function update($id,$data);
    public function delete($id);
}
