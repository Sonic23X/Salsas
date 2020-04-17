<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Salsa extends Model
{
  public function Order(){
    return $this->belongsToMany('App\Entities\Order');
  }
  public function Delivery(){
    return $this->belongsToMany('App\Entities\Delivery');
  }
}
