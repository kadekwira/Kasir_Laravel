<?php

namespace App\Services\User;

use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends Service implements UserService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }
    public function store($data){
      $this->mainRepository->store($data);
    }
    public function getAll(array $search,array $request){
      return $this->mainRepository->getAll($search,$request);
    }
    // Define your custom methods :)
}
