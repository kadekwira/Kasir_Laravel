<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Product;
use App\Http\Traits\HandleImage;

class ProductRepositoryImplement extends Eloquent implements ProductRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    use HandleImage;
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll(array $search,array $request){
       return $this->model->search($search)->paginate(8)->appends($request);
    }
    public function getSingle($id){
        return $this->model->where('id', $id)->first();
    }
    
    public function store($data){
        $this->model->create($data);
    }

    public function update($id,$data){
        $model = $this->model->where('id', $id);
        $model->update($data);
    }
    public function delete($id){
        $model = $this->model->where('id', $id)->first();
        $this->deleteImage($model->foto);
        $this->model->where('id',$id)->delete();
    }
    // Write something awesome :)
}
