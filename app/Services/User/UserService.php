<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    // Write something awesome :)
    public function store($data);
    public function getAll(array $search,array $request);
}
