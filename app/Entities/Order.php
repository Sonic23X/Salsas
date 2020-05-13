<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  public function salsas(){
    return $this->belongsToMany('App\Entities\Salsa', 'orders_detail', 'order_id', 'salsa_id')->withPivot('quantity', 'price');
  }
  public function store(){
       return $this->belongsTo('App\Entities\Store');
  }
  public function seller(){
       return $this->belongsTo('App\User','seller_id');
  }
}
