<?php

namespace App\Http\Traits;

trait HandleRupiah{
  public function getNumeric($rupiah){
    return filter_var($rupiah,FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
  }
}