<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable =
  [
    'name', 'address', 'phone', 'user_id'
  ];

    public function orders(){
         return $this->hasMany('App\Entities\Order');
    }
    public function owner(){
         return $this->belongsTo('App\User');
    }

}
