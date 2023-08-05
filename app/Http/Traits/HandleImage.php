<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait HandleImage{
  public function handleImage($data, $type){
    if($type == 'store'){
      $fileName =$data['nama_product'].$data['varian'] . "." . $data['foto']->getClientOriginalExtension();
      $path = $data['foto']->store('public/foto');
      $path = explode('/',$path);
      $path=$path[1].'/'.$path[2];
      return $path;
    }else{
        $fileName =$data['nama_product'].$data['varian'] . "." . $data['foto']->getClientOriginalExtension();
        $path = $data['foto']->store('public/foto');
        $path = explode('/',$path);
        $path=$path[1].'/'.$path[2];
        Storage::delete('public/'.$data['foto_old']); 
      return $path;
    }
  }

  public function deleteImage($path){
    Storage::delete('public/'.$path); 
  }
}