<?php

namespace App\Services\Product;

use LaravelEasyRepository\Service;
use App\Repositories\Product\ProductRepository;
use App\Http\Traits\HandleImage;
use App\Http\Traits\HandleRupiah;

class ProductServiceImplement extends Service implements ProductService{

  use HandleImage,HandleRupiah;

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ProductRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAll(array $search,array $request){
      return $this->mainRepository->getAll($search,$request);
    }
    public function getSingle($id){
      return $this->mainRepository->getSingle($id);
    }

    public function store($data){
      $data['foto'] = $this->handleImage($data,'store');
      $data['harga_pokok'] = $this->getNumeric($data['harga_pokok']);
      $data['harga_jual'] = $this->getNumeric($data['harga_jual']);
      $this->mainRepository->store($data);
    }

    public function update($id,$data){
      if($data['foto']??false){
        $data['foto'] = $this->handleImage($data,'update');
        $data['harga_pokok'] = $this->getNumeric($data['harga_pokok']);
        $data['harga_jual'] = $this->getNumeric($data['harga_jual']);
        unset($data['foto_old']);
        $this->mainRepository->update($id,$data);
      }else{
        $data['harga_pokok'] = $this->getNumeric($data['harga_pokok']);
        $data['harga_jual'] = $this->getNumeric($data['harga_jual']);
        unset($data['foto_old']);
        $this->mainRepository->update($id,$data);
      }
    }

    public function delete($id){

       $this->mainRepository->delete($id);
    }

    public function getUnAktif(array $search,array $request){
      return $this->mainRepository->getUnAktif($search,$request);
    }
    // Define your custom methods :)
}
