<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
     use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'store_id', 'seller_id', 'mount', 'notes',
    ];

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
