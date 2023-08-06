<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function store($data){
        $this->model->create($data);
    }
    public function getAll(array $search,array $request){
        return $this->model
        ->select('id','name','email','status')
        ->where('status','aktif')
        ->search($search)
        ->paginate(3)
        ->appends($request);
    }

    // Write something awesome :)
}
