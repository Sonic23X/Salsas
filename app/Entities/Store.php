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

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden =
  [
    'updated_at', 'created_at', 'deleted_at'
  ];

  //relaciones
  public function orders(){
       return $this->hasMany('App\Entities\Order');
  }

  public function owner(){
       return $this->belongsTo('App\User');
  }

}
