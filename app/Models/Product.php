<?php

namespace App\Models;

use App\Models\Varian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table="product";
    protected $guarded=['id'];


    public function scopeSearch($query ,array $search){
        if($search??false){
            $query->when($search['search']??false,function($query,$search){
                return $query->where('nama_product','like','%' . $search.'%')
                             ->orWhere('stock','like','%' . $search.'%')
                             ->orWhere('varian','like','%' . $search.'%')
                             ->orWhere('harga_jual','like','%' . $search.'%');
            });
        }
    }
}
