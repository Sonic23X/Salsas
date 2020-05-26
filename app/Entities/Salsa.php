<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salsa extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'description', 'price','active'
  ];

  public function Order(){
    return $this->belongsToMany('App\Entities\Order');
  }
  public function Delivery(){
    return $this->belongsToMany('App\Entities\Delivery');
  }
}
